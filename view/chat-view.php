<style>
   #chat3 .form-control {
      border-color: transparent;
   }

   #chat3 .form-control:focus {
      border-color: transparent;
      box-shadow: inset 0px 0px 0px 1px transparent;
   }

   .badge-dot {
      border-radius: 50%;
      height: 10px;
      width: 10px;
      margin-left: 2.9rem;
      margin-top: -.75rem;
   }

   #chat4 .form-control {
      border-color: transparent;
   }

   #chat4 .form-control:focus {
      border-color: transparent;
      box-shadow: inset 0px 0px 0px 1px transparent;
   }

   .divider:after,
   .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
   }

   .button-back {
      position: fixed;
      left: 3%;
      top: 3%;
   }
</style>
</div>
<section style="background-color: #CDC4F9;height: fit-content;display: flex;align-items: center; flex-direction: column;">
   <div class="container py-5">

      <div class="row">
         <div class="col-md-12">

            <div class="card" id="chat3" style="border-radius: 15px;">
               <div class="card-body">

                  <div class="row">
                     <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">

                        <div class="p-3">

                           <div class="input-group rounded mb-3">
                              <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                              <span class="input-group-text border-0" id="search-addon">
                                 <i class="fas fa-search"></i>
                              </span>
                           </div>

                           <div data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px;overflow: auto;">
                              <ul class="list-unstyled mb-0 table-chat-body">


                              </ul>
                           </div>

                        </div>

                     </div>

                     <div class="col-md-6 col-lg-7 col-xl-8">

                        <div class="pt-3 pe-3 container-chat" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px;overflow: auto;">

                           <div class="text-center">
                              <p>Start A new chat now :)</p>
                           </div>
                           <!-- <div class="d-flex flex-row justify-content-start">
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                              <div>
                                 <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Lorem ipsum
                                    dolor
                                    sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore
                                    magna aliqua.</p>
                                 <p class="small ms-3 mb-3 rounded-3 text-muted float-end">12:00 PM | Aug 13</p>
                              </div>
                           </div>

                           <div class="d-flex flex-row justify-content-end">
                              <div>
                                 <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Ut enim ad minim veniam,
                                    quis
                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                 <p class="small me-3 mb-3 rounded-3 text-muted">12:00 PM | Aug 13</p>
                              </div>
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                           </div>

                           <div class="d-flex flex-row justify-content-start">
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                              <div>
                                 <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Duis aute
                                    irure
                                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                 </p>
                                 <p class="small ms-3 mb-3 rounded-3 text-muted float-end">12:00 PM | Aug 13</p>
                              </div>
                           </div>

                           <div class="d-flex flex-row justify-content-end">
                              <div>
                                 <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Excepteur sint occaecat
                                    cupidatat
                                    non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                 <p class="small me-3 mb-3 rounded-3 text-muted">12:00 PM | Aug 13</p>
                              </div>
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                           </div>

                           <div class="d-flex flex-row justify-content-start">
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                              <div>
                                 <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Sed ut
                                    perspiciatis
                                    unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
                                    rem
                                    aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                                    dicta
                                    sunt explicabo.</p>
                                 <p class="small ms-3 mb-3 rounded-3 text-muted float-end">12:00 PM | Aug 13</p>
                              </div>
                           </div>

                           <div class="d-flex flex-row justify-content-end">
                              <div>
                                 <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Nemo enim ipsam
                                    voluptatem quia
                                    voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos
                                    qui
                                    ratione voluptatem sequi nesciunt.</p>
                                 <p class="small me-3 mb-3 rounded-3 text-muted">12:00 PM | Aug 13</p>
                              </div>
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                           </div>

                           <div class="d-flex flex-row justify-content-start">
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                              <div>
                                 <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Neque porro
                                    quisquam
                                    est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non
                                    numquam
                                    eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                 <p class="small ms-3 mb-3 rounded-3 text-muted float-end">12:00 PM | Aug 13</p>
                              </div>
                           </div>

                           <div class="d-flex flex-row justify-content-end">
                              <div>
                                 <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Ut enim ad minima veniam,
                                    quis
                                    nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea
                                    commodi
                                    consequatur?</p>
                                 <p class="small me-3 mb-3 rounded-3 text-muted">12:00 PM | Aug 13</p>
                              </div>
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                           </div> -->

                        </div>

                        <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2">
                           <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp" alt="avatar 3" style="width: 40px; height: 100%;">
                           <input type="text" class="form-control form-control-lg" id="chat-input" placeholder="Type message">
                           <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                           <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
                           <a class="ms-3" href="#!" id="btnSendMsg"><i class="fas fa-paper-plane"></i></a>
                        </div>

                     </div>
                  </div>

               </div>
            </div>

         </div>
      </div>

   </div>

   <div class="container py-5">

      <div class="row d-flex justify-content-center">
         <div class="col-md-8 col-lg-6 col-xl-4">

            <!-- Buttons trigger collapse -->
            <a class="btn btn-info btn-lg btn-block" data-mdb-toggle="collapse" data-mdb-target href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
               <div class="d-flex justify-content-between align-items-center">
                  <span>Discover friend here !</span>
                  <i class="fas fa-chevron-down"></i>
               </div>
            </a>

            <!-- Collapsed content -->
            <div class="collapse mt-3 show" id="collapseExample">
               <div class="card" id="chat4" style="width: 380px;">
                  <div class="card-body table-discover-friend" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px;overflow: auto;">


                     <?php $i = 1; ?>
                     <?php foreach ($discoverFriendList as $index => $d) : ?>
                        <?php if ($d->getNik() !== $_SESSION['nik']) : ?>
                           <div class="d-flex flex-row justify-content-start">
                              <img src="src/img/uploads/<?= $d->getImages() ? $d->getImages() : 'ava' . random_int(1, 4) . '-bg.webp'; ?>" class="recent-user-profile-pic" alt="avatar 1" style="width: 45px; height: 100%;">
                              <div class="my-2 ">
                                 <a href="#" class="small p-2 ms-3 mb-1 rounded-3 contact-name" data-nik="<?= $d->getNik(); ?>" style="background-color: #f5f6f7;"><?= $d->getName(); ?></a>
                              </div>
                           </div>
                           <?php $i++; ?>
                        <?php endif; ?>
                     <?php endforeach; ?>
                     <!-- <div class="d-flex flex-row justify-content-start">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                        <div>
                           <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Hi</p>
                           <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">How are you
                              ...???</p>
                           <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">What are you
                              doing
                              tomorrow? Can we come up a bar?</p>
                           <p class="small ms-3 mb-3 rounded-3 text-muted">23:58</p>
                        </div>
                     </div>

                     <div class="divider d-flex align-items-center mb-4">
                        <p class="text-center mx-3 mb-0" style="color: #a2aab7;">Today</p>
                     </div>

                     <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                        <div>
                           <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-info">Hiii, I'm good.</p>
                           <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-info">How are you doing?</p>
                           <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-info">Long time no see! Tomorrow
                              office. will
                              be free on sunday.</p>
                           <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:06</p>
                        </div>
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                     </div>

                     <div class="d-flex flex-row justify-content-start mb-4">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                        <div>
                           <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Okay</p>
                           <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">We will go on
                              Sunday?</p>
                           <p class="small ms-3 mb-3 rounded-3 text-muted">00:07</p>
                        </div>
                     </div>

                     <div class="d-flex flex-row justify-content-end mb-4">
                        <div>
                           <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-info">That's awesome!</p>
                           <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-info">I will meet you Sandon Square
                              sharp at
                              10 AM</p>
                           <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-info">Is that okay?</p>
                           <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:09</p>
                        </div>
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                     </div>

                     <div class="d-flex flex-row justify-content-start mb-4">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                        <div>
                           <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Okay i will meet
                              you on
                              Sandon Square</p>
                           <p class="small ms-3 mb-3 rounded-3 text-muted">00:11</p>
                        </div>
                     </div>

                     <div class="d-flex flex-row justify-content-end mb-4">
                        <div>
                           <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-info">Do you have pictures of Matley
                              Marriage?</p>
                           <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:11</p>
                        </div>
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                     </div>

                     <div class="d-flex flex-row justify-content-start mb-4">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                        <div>
                           <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Sorry I don't
                              have. i
                              changed my phone.</p>
                           <p class="small ms-3 mb-3 rounded-3 text-muted">00:13</p>
                        </div>
                     </div> -->

                  </div>
                  <!-- <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                     <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp" alt="avatar 3" style="width: 40px; height: 100%;">
                     <input type="text" class="form-control form-control-lg" id="exampleFormControlInput3" placeholder="Type message">
                     <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                     <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
                     <a class="ms-3 link-info" href="#!"><i class="fas fa-paper-plane"></i></a>
                  </div> -->
               </div>
            </div>

         </div>
      </div>

   </div>
</section>
<a class="btn btn-primary button-back" href="?menu=tables">Kembali</a>
<script>
   const containerChatBox = document.querySelector('.container-chat');
   const tableChatBody = document.querySelector('.table-chat-body');
   const tableDiscoverFriend = document.querySelector('.table-discover-friend');
   // const labelGuestName = document.querySelector('.guest-name');
   const inpMsg = document.getElementById('chat-input');
   const btnSendMsg = document.getElementById('btnSendMsg');
   const chatBoxHeaderForMinimize = document.querySelector('.chatbox');
   const containerTableChat = document.querySelector('.table-chat-body');
   const btnMinimizeChatBox = document.querySelector('.chatbox-icons');
   const recentUserProfilePic = document.querySelector('.recent-user-profile-pic');
   let currentOpenedChatRoom = false;
   let currentOpenedRelation = false;

   var conn = new WebSocket('ws://localhost:9090');
   conn.onopen = function(e) {
      console.log("Connection established!");
      const dataOnOpen = {
         nik: <?= $_SESSION['nik']; ?>,
         username: "<?= $_SESSION['username']; ?>",
         type: "chat-view"
      }

      conn.send(JSON.stringify(dataOnOpen))
   };

   conn.onmessage = function(e) {
      let data = JSON.parse(e.data);
      let markup = '';

      switch (data.type) {
         case 'parsing-contact':
            console.log(data);
            data.response.forEach((contact, index) => {
               markup = `
               <li class="p-2 border-bottom">
                  <a href="#!" class="d-flex justify-content-between">
                     <div class="d-flex flex-row">
                        <div>
                           <img src="src/img/uploads/${contact[3] ? contact[3] : 'ava' + Math.floor(Math.random() * 4 + 1) + '-bg.webp'}" alt="avatar" class="d-flex align-self-center me-3" width="60">
                           <span class="badge bg-warning badge-dot"></span>
                        </div>
                        <div class="pt-1">
                           <p class="fw-bold mb-0 contact-name" data-nik="${contact[0]}">${contact[1]}</p>
                           <p class="small text-muted">Lorem ipsum dolor sit.</p>
                        </div>
                     </div>
                     <div class="pt-1">
                        <p class="small text-muted mb-1">5 mins ago</p>
                        <span class="badge bg-danger rounded-pill float-end">2</span>
                     </div>
                  </a>
               </li>`
               containerTableChat.insertAdjacentHTML('beforeend', markup);
            })
            break;
         case 'data-message':
            console.log(data);
            containerChatBox.innerHTML = '';
            if (data.relation == 'me') {
               data.message_user.forEach(msg => {
                  if (msg[0] !== '<?= $_SESSION['name']; ?>') {
                     markup = `<div class="d-flex flex-row justify-content-start">
                                 <img src="src/img/uploads/${typeof msg[3] == 'object' ? 'ava1-bg.webp' : msg[3]}" alt="avatar 1" style="width: 45px; height: 100%;">
                                 <div>
                                    <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">${msg[1]}</p>
                                    <p class="small ms-3 mb-3 rounded-3 text-muted float-end">${msg[0]} | ${msg[2]}</p>
                                 </div>
                              </div>`;
                  } else {
                     markup = `<div class="d-flex flex-row justify-content-end">
                                 <div>
                                    <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">${msg[1]}</p>
                                    <p class="small me-3 mb-3 rounded-3 text-muted"> me | ${msg[2]}</p>
                                 </div>
                                 <img src="src/img/uploads/${typeof msg[3] == 'object' ? 'ava1-bg.webp' : msg[3]}" alt="avatar 1" style="width: 45px; height: 100%;">
                              </div>
                     `
                  }
                  containerChatBox.insertAdjacentHTML('beforeend', markup);
               })
            }
            btnSendMsg.dataset.roomId = data.room_id;
            currentOpenedChatRoom = data.room_id;
            break;
         case 'parsing-new-chat':
            console.log(data);
            if (data.messageFor === 'me') {
               markup = `<div class="d-flex flex-row justify-content-end">
                           <div>
                              <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">${data.message}</p>
                              <p class="small me-3 mb-3 rounded-3 text-muted"> me | ${data.date}</p>
                           </div>
                           <img class='my-profile' src="src/img/uploads/${typeof data.images === 'object' ? 'ava1-bg.webp' : data.images}" alt="avatar 1" style="width: 45px; height: 100%;">
                        </div>`;
               containerChatBox.insertAdjacentHTML('beforeend', markup);
            } else if (currentOpenedChatRoom == data.room_id) {
               markup = `<div class="d-flex flex-row justify-content-start">
                           <img class='friend-profile' src="src/img/uploads/${typeof data.images === 'object' ? 'ava1-bg.webp' : data.images }" alt="avatar 1" style="width: 45px; height: 100%;">
                           <div>
                              <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">${data.message}</p>
                              <p class="small ms-3 mb-3 rounded-3 text-muted float-end">${data.relation} | ${data.date}</p>
                           </div>
                        </div>`;
               containerChatBox.insertAdjacentHTML('beforeend', markup);
            }
            break;
         case 'parsing-new-room':
            console.log(data);
            markup = `<div class="text-center">
                        <p>${data.message}</p>
                     </div>`;
            containerChatBox.innerHTML = '';
            btnSendMsg.dataset.roomId = data.room_id;
            btnSendMsg.dataset.messageFor = data.messageRequestFor;
            currentOpenedChatRoom = data.room_id;
            containerChatBox.insertAdjacentHTML('beforeend', markup);
            break;
      }
   };

   tableChatBody.addEventListener('click', (e) => {
      const element = e.target.closest('.contact-name');
      if (!element) return;

      const request = element.dataset.nik;
      const dataRequest = {
         username: '<?= $_SESSION['username']; ?>',
         reqBy: '<?= $_SESSION['nik']; ?>',
         reqId: request,
         friendImages: recentUserProfilePic.src,
         type: 'chat-detail-request',
      }
      btnSendMsg.dataset.messageFor = element.dataset.nik;
      inpMsg.placeholder = `type message to ${element.innerText}`;
      // chatBoxHeaderForMinimize.classList.remove('chatbox-min');
      conn.send(JSON.stringify(dataRequest));
   })

   //#TODO: BUTTON
   btnSendMsg.addEventListener('click', (e) => {
      e.preventDefault();

      let message = inpMsg.value || null;
      if (!message) return;
      if (!currentOpenedChatRoom) return;

      const data = {
         username: '<?= $_SESSION['username']; ?>',
         userId: <?= $_SESSION['nik']; ?>,
         messageData: message,
         messageFor: btnSendMsg.dataset.messageFor,
         room_id: btnSendMsg.dataset.roomId,
         type: 'chat-send-request',
      }

      console.log(data);
      conn.send(JSON.stringify(data));
      inpMsg.value = '';
   })

   tableDiscoverFriend.addEventListener('click', (e) => {
      const element = e.target.closest('.contact-name');
      if (!element) return;

      const data = {
         username: '<?= $_SESSION['username']; ?>',
         userId: <?= $_SESSION['nik'] ?>,
         discoverFor: element.dataset.nik,
         type: 'chat-discover-friend-request'
      }

      console.log(data);
      btnSendMsg.dataset.messageFor = element.dataset.nik;
      inpMsg.placeholder = `type message to ${element.innerText}`;
      conn.send(JSON.stringify(data));
   })

   function minimizeChatBoxScreen() {
      chatBoxHeaderForMinimize.classList.toggle('chatbox-min');
   }

   // conn.send(JSON.stringify(data));
</script>