

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div id="app" class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header text-center">
					<div class="row">
						<div class="col">
							<button class="btn btn-sm" :class="activeRoom.id == room.id ? 'btn-warning' : 'btn-secondary'" v-for="room in rooms" @click="() => {fetchMessagesByRoom(room); activeRoomToogle(room)}"> 
								#@{{room.id}} | @{{room.name}}
							</button>
						</div>
						<div class="col">
							@auth()
								{{auth()->user()->name}} 
								<button class="btn btn-sm btn-warning me-1" type="button"  data-bs-toggle="modal" data-bs-target="#newRoom">Yeni Oda</button>
								<button class="btn btn-sm btn-warning" form="logout">Çıkış</button>

								<form method="POST" action="{{route('logout')}}" id="logout">
									@csrf
								</form>
							@else

								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
									Login
								</button>
							@endauth
						</div>
					</div>
				</div>
				@auth()
				<div class="card-body chat-box" style="height: 400px; overflow-y: scroll;">
					<div v-if="activeRoom?.id" v-for="message in activeRoom.messages" :key="message.id" class="mb-3">
						<strong>@{{ message.user.name }}:</strong>
						<span>@{{ message.message }}</span>
						<span class="text-muted float-end">@{{ message.time }}</span>
					</div>
					<div v-else>
						<div class="alert alert-info">
							Lütfen bir oda seçiniz veya bir oda oluşturunuz <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#newRoom" type="button">Oluştur</button>
						</div>
					</div>

				</div>
				@else
				<div class="card-body d-flex justify-content-center">
					<span class="alert alert-danger">
						Lütfen Giriş Yapınız!
					</span>
				</div>
				@endif
				<div class="card-footer" v-if="activeRoom.id">
					<form @submit.prevent="sendMessageByRoomId">
						<div class="input-group">
							<input type="text" ref="message" class="form-control" placeholder="Type a message" required>
							<button class="btn btn-primary" type="submit">Send</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>




<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="loginModalLabel">Login Form</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form @submit.prevent="loginFormSubmitHandle" id="login-form">
				<div class="form-group">
					<label for="email" class="form-label" >Email</label>
					<input type="email" class="form-control" required ref="email" value="" placeholder="Mevcut kullanıcılar: {{\App\Models\User::get("email")->pluck('email')->join(', ')}}"/>
				</div>

				<div class="form-group">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control" required ref="password" value="password"/>
					<div class="alert alert-info p-0">Hepsinin şifresi 'password'</div>

				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" form="login-form" class="btn btn-primary">Login</button>
		</div>
		</div>
	</div>
</div>

<div class="modal fade" id="newRoom" tabindex="-1" aria-labelledby="newRoomLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="newRoomLabel">Yeni Oda</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form @submit.prevent="loginFormSubmitHandle" id="login-form">
				<div class="form-group">
					<label for="text" class="form-label" >Yeni oda adı</label>
					<input type="text" class="form-control" required ref="newRoomName" value=""/>
				</div>

				<div class="form-group mt-3">
					<label for="users" class="form-label">Kullanıcıları Ekle</label>
					<select name="" id="" class="form-control" multiple>
						<option value="">Test #1</option>
						<option value="">Test #2</option>
					</select>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" form="login-form" class="btn btn-primary">Login</button>
		</div>
		</div>
	</div>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	const Toast = Swal.mixin({
		toast: true,
		position: "bottom-end",
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.onmouseenter = Swal.stopTimer;
			toast.onmouseleave = Swal.resumeTimer;
		}
		});


		
</script>
<script>
	const app = Vue.createApp({
		data() {
			return {
				newMessage: '',
				rooms: [],
				messages: []
			};
		},
		computed:{
			activeRoom: function(){
				return this.rooms.find(room => room.active) ?? {};
			}
		},
		methods: {
			sendMessage() {
				const newMessageObject = {
					id: this.messages.length + 1,
					user: 'You',
					text: this.newMessage,
					time: new Date().toLocaleTimeString()
				};
				this.messages.push(newMessageObject);
				this.newMessage = '';
			},
			async loginFormSubmitHandle(e){
				const result = await axios.post('{{route('login')}}', {
					email: this.$refs.email.value,
					password: this.$refs.password.value
				});

				if(result.status == 200 && result.data.status == 'success'){
					window.location.href = '/'
				}else{
					alert("Giriş Bilgilerinde Hata Var")
				}
				
			},
			async fetchRooms(){
				const result = await axios.get('{{route('api.rooms.index')}}')
				
				if(result.status == 200 && result.data.status == 'success'){
					this.rooms = result.data.data;
				}
			},
			activeRoomToogle(newActiveRoom){
				 this.rooms = this.rooms.map((room) => {
					return {
						...room,
						// room.id eşleşiyorsa ve room zaten aktifse, pasif yap, değilse aktif yap
						active: room.id === newActiveRoom.id ? !room.active : false
					};
				});
			},
			async fetchMessagesByRoom(room){


				let url = '{{route('api.rooms.messages.index', ['#room_id#'])}}';

				url = url.replace('#room_id#', room.id);
				const result = await axios.get(url);

				if(result.status == 200 && result.data.status == 'success'){
					this.activeRoom.messages = result.data.data;

					
				}

			},
			async sendMessageByRoomId(){
				let url = '{{route('api.rooms.messages.store', ['#room_id#'])}}';
				url = url.replace('#room_id#', this.activeRoom.id);

				const result = await axios.post(url, {
					message: this.$refs.message.value
				});

				if(result.status == 200 && result.data.status == 'success'){
					this.$refs.message.value = "";
					this.fetchMessagesByRoom(this.activeRoom)
				}else{
					
				}

			}
		},
		mounted: function(){
			const self = this;
			
			setTimeout(() => {
					self.fetchRooms();


					window.Echo.private(`Auth.{{auth()->id()}}.MessageAction`)
						.listen('MessageActionEvent', (e) => {
							if(e.room.id == self.activeRoom?.id){
								self.fetchMessagesByRoom(self.activeRoom);
							}else{
								Toast.fire({
									icon: "success",
									html: `<b>${e.room.name}</b> odasından yeni bir mesaj var.<br><b>${e.user.name}</b>: ${e.message.message}`
								});
							}
						});

			}, 1000);
		}
	});

	app.mount('#app');

	
</script>


</body>
</html>
