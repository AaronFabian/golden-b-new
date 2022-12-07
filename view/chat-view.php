<style>
   ul {
      list-style: none;
   }

   .chatbox-holder {
      position: fixed;
      right: 0;
      bottom: 0;
      display: flex;
      align-items: flex-end;
      height: 0;
   }

   .chatbox {
      width: 400px;
      height: 400px;
      margin: 0 20px 0 0;
      position: relative;
      box-shadow: 0 0 5px 0 rgba(0, 0, 0, .2);
      display: flex;
      flex-flow: column;
      border-radius: 10px 10px 0 0;
      background: white;
      bottom: 0;
      transition: .1s ease-out;
   }

   .chatbox-top {
      position: relative;
      display: flex;
      padding: 10px 0;
      border-radius: 10px 10px 0 0;
      background: rgba(0, 0, 0, .05);
   }

   .chatbox-icons {
      padding: 0 10px 0 0;
      display: flex;
      position: relative;
   }

   .chatbox-icons .fa {
      /* background: rgba(220, 0, 0, .6); */
      padding: 3px 5px;
      margin: 0 0 0 3px;
      color: white;
      border-radius: 0 5px 0 5px;
      transition: 0.3s;
   }

   .chatbox-icons .fa:hover {
      border-radius: 5px 0 5px 0;
      /* background: rgba(220, 0, 0, 1); */
   }

   .chatbox-icons a,
   .chatbox-icons a:link,
   .chatbox-icons a:visited {
      color: white;
   }

   .chat-partner-name,
   .chat-group-name {
      flex: 1;
      padding: 0 0 0 95px;
      font-size: 15px;
      font-weight: bold;
      color: #30649c;
      text-shadow: 1px 1px 0 white;
      transition: .1s ease-out;
   }

   .status {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      display: inline-block;
      box-shadow: inset 0 0 3px 0 rgba(0, 0, 0, 0.2);
      border: 1px solid rgba(0, 0, 0, 0.15);
      background: #cacaca;
      margin: 0 3px 0 0;
   }

   .online {
      background: #b7fb00;
   }

   .away {
      background: #ffae00;
   }

   .donot-disturb {
      background: #ff4343;
   }

   .chatbox-avatar {
      width: 80px;
      height: 80px;
      overflow: hidden;
      border-radius: 50%;
      background: white;
      padding: 3px;
      box-shadow: 0 0 5px 0 rgba(0, 0, 0, .2);
      position: absolute;
      transition: .1s ease-out;
      bottom: 0;
      left: 6px;
   }

   .chatbox-avatar img {
      width: 100%;
      height: 100%;
      border-radius: 50%;
   }

   .chat-messages {
      border-top: 1px solid rgba(0, 0, 0, .05);
      padding: 10px;
      overflow: auto;
      display: flex;
      flex-flow: row wrap;
      align-content: flex-start;
      flex: 1;
   }

   .message-box-holder {
      width: 100%;
      margin: 0 0 15px;
      display: flex;
      flex-flow: column;
      align-items: flex-end;
   }

   .message-sender {
      font-size: 12px;
      margin: 0 0 15px;
      color: #30649c;
      align-self: flex-start;
   }

   .message-sender a,
   .message-sender a:link,
   .message-sender a:visited,
   .chat-partner-name a,
   .chat-partner-name a:link,
   .chat-partner-name a:visited {
      color: #30649c;
      text-decoration: none;
   }

   .message-box {
      padding: 6px 10px;
      border-radius: 6px 0 6px 0;
      position: relative;
      background: rgba(100, 170, 0, .1);
      border: 2px solid rgba(100, 170, 0, .1);
      color: #6c6c6c;
      font-size: 12px;
   }

   .message-box:after {
      content: "";
      position: absolute;
      border: 10px solid transparent;
      border-top: 10px solid rgba(100, 170, 0, .2);
      border-right: none;
      bottom: -22px;
      right: 10px;
   }

   .message-partner {
      background: rgba(0, 114, 135, .1);
      border: 2px solid rgba(0, 114, 135, .1);
      align-self: flex-start;
   }

   .message-partner:after {
      right: auto;
      bottom: auto;
      top: -22px;
      left: 9px;
      border: 10px solid transparent;
      border-bottom: 10px solid rgba(0, 114, 135, .2);
      border-left: none;
   }

   .chat-input-holder {
      display: flex;
      border-top: 1px solid rgba(0, 0, 0, .1);
   }

   /* .chat-input {
      resize: none;
      padding: 5px 10px;
      height: 40px;
      font-family: 'Lato', sans-serif;
      font-size: 14px;
      color: #999999;
      flex: 1;
      border: none;
      background: rgba(0, 0, 0, .05);
      border-bottom: 1px solid rgba(0, 0, 0, .05);
   } */

   .chat-input {
      resize: none;
      padding: 5px 10px;
      height: 40px;
      font-family: 'Lato', sans-serif;
      font-size: 14px;
      color: #999999;
      flex: 1;
      border: none;
      background: rgba(0, 0, 0, .05);
      border-bottom: 1px solid rgba(0, 0, 0, .05);
   }

   .chat-input:focus,
   .message-send:focus {
      outline: none;
   }

   .message-send::-moz-focus-inner {
      border: 0;
      padding: 0;
   }

   .message-send {
      -webkit-appearance: none;
      /* background: #9cc900; */
      /* background: -moz-linear-gradient(180deg, #00d8ff, #00b5d6);
      background: -webkit-linear-gradient(180deg, #00d8ff, #00b5d6);
      background: -o-linear-gradient(180deg, #00d8ff, #00b5d6);
      background: -ms-linear-gradient(180deg, #00d8ff, #00b5d6);
      background: linear-gradient(180deg, #00d8ff, #00b5d6); */
      color: white;
      font-size: 12px;
      padding: 0 15px;
      border: none;
      text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.3);
   }

   .message-send:hover {
      opacity: 0.8;
   }

   .message-send:active {
      background-color: #ffae00 !important;
   }

   .attachment-panel {
      padding: 3px 10px;
      text-align: right;
   }

   .attachment-panel a,
   .attachment-panel a:link,
   .attachment-panel a:visited {
      margin: 0 0 0 7px;
      text-decoration: none;
      color: rgba(0, 0, 0, 0.5);
   }

   .chatbox-min {
      margin-bottom: -362px;
      /*   height: 46px; */
   }

   .chatbox-min .chatbox-avatar {
      width: 60px;
      height: 60px;
   }

   .chatbox-min .chat-partner-name,
   .chatbox-min .chat-group-name {
      padding: 0 0 0 75px;
   }

   .settings-popup {
      background: white;
      border-radius: 20px/10px;
      box-shadow: 0 3px 5px 0 rgba(0, 0, 0, .2);
      font-size: 13px;
      opacity: 0;
      padding: 10px 0;
      position: absolute;
      right: 0;
      text-align: left;
      top: 33px;
      transition: .15s;
      transform: scale(1, 0);
      transform-origin: 50% 0;
      width: 120px;
      z-index: 2;
      border-top: 1px solid rgba(0, 0, 0, .2);
      border-bottom: 2px solid rgba(0, 0, 0, .3);
   }

   .settings-popup:after,
   .settings-popup:before {
      border: 7px solid transparent;
      border-bottom: 7px solid white;
      border-top: none;
      content: "";
      position: absolute;
      left: 45px;
      top: -10px;
      border-top: 3px solid rgba(0, 0, 0, .2);
   }

   .settings-popup:before {
      border-bottom: 7px solid rgba(0, 0, 0, .25);
      top: -11px;
   }

   .settings-popup:after {
      border-top-color: transparent;
   }

   #chkSettings {
      display: none;
   }

   #chkSettings:checked+.settings-popup {
      opacity: 1;
      transform: scale(1, 1);
   }

   .settings-popup ul li a,
   .settings-popup ul li a:link,
   .settings-popup ul li a:visited {
      color: #999;
      text-decoration: none;
      display: block;
      padding: 5px 10px;
   }

   .settings-popup ul li a:hover {
      background: rgba(0, 0, 0, .05);
   }

   .table tbody tr th,
   .table tbody tr td {
      cursor: pointer;
   }

   .table tbody tr th:hover,
   .table tbody tr td:hover {
      text-decoration: underline;
   }

   .table tbody tr th:active,
   .table tbody tr td:active {
      color: blue;
      text-decoration: none;
   }

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
</style>
<div class="container mt-4 me-1">
   <div class="row">
      <div class="col-4">
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">No</th>
                  <th scope="col">Recent chat</th>
               </tr>
            </thead>
            <tbody class="table-chat-body">
               <!-- <tr>
                  <th scope="row">1</th>
                  <td class="contact-name">Mark</td>
               </tr> -->

            </tbody>
         </table>
      </div>
   </div>
</div>
<div class="container mt-4 me-1">
   <div class="row">
      <div class="col-4">
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">No</th>
                  <th scope="col">Discover Friend !</th>
               </tr>
            </thead>
            <tbody class="table-discover-friend">
               <?php $i = 1; ?>
               <?php foreach ($discoverFriendList as $index => $d) : ?>
                  <?php if ($d->getNik() !== $_SESSION['nik']) : ?>
                     <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td class="contact-name" data-nik="<?= $d->getNik(); ?>"><?= $d->getName(); ?></td>
                     </tr>
                     <?php $i++; ?>
                  <?php endif; ?>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<div class="chatbox-holder">
   <div class="chatbox chatbox-min">
      <div class="chatbox-top">
         <div class="chatbox-avatar">
            <a target="_blank" href="#"><img src="./src/img/team-1.jpg" /></a>
         </div>
         <div class="chat-partner-name">
            <span class="status online"></span>
            <a target="_blank" href="#" class="guest-name"></a>
         </div>
         <div class="chatbox-icons bg-danger" onclick="minimizeChatBoxScreen()">
            <a href="javascript:void(0);"><i class="fa fa-minus"></i></a>
            <!-- <a href="javascript:void(0);"><i class="fa fa-close"></i></a> -->
         </div>
      </div>

      <div class="chat-messages container-chat">


      </div>

      <div class="chat-input-holder">
         <textarea id="chat-input" class="chat-input"></textarea>
         <input type="submit" value="Send" class="message-send bg-primary" id="btnSendMsg">
      </div>
   </div>
   <!-- <div class="chatbox group-chat">
      <div class="chatbox-top">
         <div class="chatbox-avatar">
            <a target="_blank" href="https://www.facebook.com/mfreak"><img src="https://avatars0.githubusercontent.com/u/7145968?v=3&s=460" /></a>
         </div>

         <div class="chat-group-name">
            <span class="status away"></span>
            Group name comes here
         </div>
         <div class="chatbox-icons">
            <label for="chkSettings"><i class="fa fa-gear"></i></label><input type="checkbox" id="chkSettings" />
            <div class="settings-popup">
               <ul>
                  <li><a href="#">Group members</a></li>
                  <li><a href="#">Add members</a></li>
                  <li><a href="#">Delete members</a></li>
                  <li><a href="#">Leave group</a></li>
               </ul>
            </div>
            <a href="javascript:void(0);"><i class="fa fa-minus"></i></a>
            <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
         </div>
      </div>

      <div class="chat-messages">
         <div class="message-box-holder">
            <div class="message-box">
               What are you people doing?
            </div>
         </div>

         <div class="message-box-holder">
            <div class="message-sender">
               <a href="#">Ben Stiller</a>
            </div>
            <div class="message-box message-partner">
               Hey, nobody's here today. I'm at office alone.
               Hey, nobody's here today. I'm at office alone.
            </div>
         </div>

         <div class="message-box-holder">
            <div class="message-box">
               who else is online?
            </div>
         </div>

         <div class="message-box-holder">
            <div class="message-sender">
               <a href="#">Chris Jerrico</a>
            </div>
            <div class="message-box message-partner">
               I'm also online. How are you people?
            </div>
         </div>

         <div class="message-box-holder">
            <div class="message-box">
               I am fine.
            </div>
         </div>

         <div class="message-box-holder">
            <div class="message-sender">
               <a href="#">Rockey</a>
            </div>
            <div class="message-box message-partner">
               I'm also online. How are you people?
            </div>
         </div>

         <div class="message-box-holder">
            <div class="message-sender">
               <a href="#">Christina Farzana</a>
            </div>
            <div class="message-box message-partner">
               We are doing fine. I am in.
            </div>
         </div>
      </div>

      <div class="chat-input-holder">
         <textarea class="chat-input"></textarea>
         <input type="submit" value="Send" class="message-send" />
      </div>

      <div class="attachment-panel">
         <a href="#" class="fa fa-thumbs-up"></a>
         <a href="#" class="fa fa-camera"></a>
         <a href="#" class="fa fa-video-camera"></a>
         <a href="#" class="fa fa-image"></a>
         <a href="#" class="fa fa-paperclip"></a>
         <a href="#" class="fa fa-link"></a>
         <a href="#" class="fa fa-trash-o"></a>
         <a href="#" class="fa fa-search"></a>
      </div>
   </div> -->

   <!-- <div class="chatbox chatbox-min">
      <div class="chatbox-top">
         <div class="chatbox-avatar">
            <a target="_blank" href="https://www.facebook.com/mfreak"><img src="https://lh3.googleusercontent.com/-iJhKZHM5Kqs/Vgg2r91epsI/AAAAAAAAAgo/uGT4-sqPJzg/w800-h800/IMG_1339.jpg" /></a>
         </div>
         <div class="chat-partner-name">
            <span class="status donot-disturb"></span>
            <a target="_blank" href="https://www.facebook.com/mfreak">Mamun Khandaker</a>
         </div>
         <div class="chatbox-icons">
            <a href="javascript:void(0);"><i class="fa fa-minus"></i></a>
            <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
         </div>
      </div>

      <div class="chat-messages">
         <div class="message-box-holder">
            <div class="message-box">
               Hello
            </div>
         </div>

         <div class="message-box-holder">
            <div class="message-sender">
               Mamun Khandaker
            </div>
            <div class="message-box message-partner">
               Hi.
            </div>
         </div>

         <div class="message-box-holder">
            <div class="message-box">
               How are you doing?
            </div>
         </div>

         <div class="message-box-holder">
            <div class="message-sender">
               Mamun Khandaker
            </div>
            <div class="message-box message-partner">
               I'm doing fine. How about you?
            </div>
         </div>

         <div class="message-box-holder">
            <div class="message-box">
               I am fine.
            </div>
         </div>

         <div class="message-box-holder">
            <div class="message-box">
               Do you know why I knocked you today?
            </div>
         </div>

         <div class="message-box-holder">
            <div class="message-box">
               There's something important I would like to share with you. Do you have some time?
            </div>
         </div>

         <div class="message-box-holder">
            <div class="message-sender">
               Mamun Khandaker
            </div>
            <div class="message-box message-partner">
               Yeah sure. Let's meet in the Einstein cafe this evening and discuss the matter.
            </div>
         </div>

         <div class="message-box-holder">
            <div class="message-sender">
               Mamun Khandaker
            </div>
            <div class="message-box message-partner">
               I thought of coming to your place and discuss about it but I had to finish my projects and I didn't have enough time to go out of the house.
            </div>
         </div>
      </div>

      <div class="chat-input-holder">
         <textarea class="chat-input"></textarea>
         <input type="submit" value="Send" class="message-send" />
      </div>

      <div class="attachment-panel">
         <a href="#" class="fa fa-thumbs-up"></a>
         <a href="#" class="fa fa-camera"></a>
         <a href="#" class="fa fa-video-camera"></a>
         <a href="#" class="fa fa-image"></a>
         <a href="#" class="fa fa-paperclip"></a>
         <a href="#" class="fa fa-link"></a>
         <a href="#" class="fa fa-trash-o"></a>
         <a href="#" class="fa fa-search"></a>
      </div>
   </div> -->
</div>
<section style="background-color: #CDC4F9;">
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

                           <div data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">
                              <ul class="list-unstyled mb-0">
                                 <li class="p-2 border-bottom">
                                    <a href="#!" class="d-flex justify-content-between">
                                       <div class="d-flex flex-row">
                                          <div>
                                             <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar" class="d-flex align-self-center me-3" width="60">
                                             <span class="badge bg-success badge-dot"></span>
                                          </div>
                                          <div class="pt-1">
                                             <p class="fw-bold mb-0">Marie Horwitz</p>
                                             <p class="small text-muted">Hello, Are you there?</p>
                                          </div>
                                       </div>
                                       <div class="pt-1">
                                          <p class="small text-muted mb-1">Just now</p>
                                          <span class="badge bg-danger rounded-pill float-end">3</span>
                                       </div>
                                    </a>
                                 </li>
                                 <li class="p-2 border-bottom">
                                    <a href="#!" class="d-flex justify-content-between">
                                       <div class="d-flex flex-row">
                                          <div>
                                             <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp" alt="avatar" class="d-flex align-self-center me-3" width="60">
                                             <span class="badge bg-warning badge-dot"></span>
                                          </div>
                                          <div class="pt-1">
                                             <p class="fw-bold mb-0">Alexa Chung</p>
                                             <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                          </div>
                                       </div>
                                       <div class="pt-1">
                                          <p class="small text-muted mb-1">5 mins ago</p>
                                          <span class="badge bg-danger rounded-pill float-end">2</span>
                                       </div>
                                    </a>
                                 </li>
                                 <li class="p-2 border-bottom">
                                    <a href="#!" class="d-flex justify-content-between">
                                       <div class="d-flex flex-row">
                                          <div>
                                             <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar" class="d-flex align-self-center me-3" width="60">
                                             <span class="badge bg-success badge-dot"></span>
                                          </div>
                                          <div class="pt-1">
                                             <p class="fw-bold mb-0">Danny McChain</p>
                                             <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                          </div>
                                       </div>
                                       <div class="pt-1">
                                          <p class="small text-muted mb-1">Yesterday</p>
                                       </div>
                                    </a>
                                 </li>
                                 <li class="p-2 border-bottom">
                                    <a href="#!" class="d-flex justify-content-between">
                                       <div class="d-flex flex-row">
                                          <div>
                                             <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp" alt="avatar" class="d-flex align-self-center me-3" width="60">
                                             <span class="badge bg-danger badge-dot"></span>
                                          </div>
                                          <div class="pt-1">
                                             <p class="fw-bold mb-0">Ashley Olsen</p>
                                             <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                          </div>
                                       </div>
                                       <div class="pt-1">
                                          <p class="small text-muted mb-1">Yesterday</p>
                                       </div>
                                    </a>
                                 </li>
                                 <li class="p-2 border-bottom">
                                    <a href="#!" class="d-flex justify-content-between">
                                       <div class="d-flex flex-row">
                                          <div>
                                             <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp" alt="avatar" class="d-flex align-self-center me-3" width="60">
                                             <span class="badge bg-warning badge-dot"></span>
                                          </div>
                                          <div class="pt-1">
                                             <p class="fw-bold mb-0">Kate Moss</p>
                                             <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                          </div>
                                       </div>
                                       <div class="pt-1">
                                          <p class="small text-muted mb-1">Yesterday</p>
                                       </div>
                                    </a>
                                 </li>
                                 <li class="p-2">
                                    <a href="#!" class="d-flex justify-content-between">
                                       <div class="d-flex flex-row">
                                          <div>
                                             <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp" alt="avatar" class="d-flex align-self-center me-3" width="60">
                                             <span class="badge bg-success badge-dot"></span>
                                          </div>
                                          <div class="pt-1">
                                             <p class="fw-bold mb-0">Ben Smith</p>
                                             <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                          </div>
                                       </div>
                                       <div class="pt-1">
                                          <p class="small text-muted mb-1">Yesterday</p>
                                       </div>
                                    </a>
                                 </li>
                              </ul>
                           </div>

                        </div>

                     </div>

                     <div class="col-md-6 col-lg-7 col-xl-8">

                        <div class="pt-3 pe-3" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">

                           <div class="d-flex flex-row justify-content-start">
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
                           </div>

                        </div>

                        <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2">
                           <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp" alt="avatar 3" style="width: 40px; height: 100%;">
                           <input type="text" class="form-control form-control-lg" id="exampleFormControlInput2" placeholder="Type message">
                           <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                           <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
                           <a class="ms-3" href="#!"><i class="fas fa-paper-plane"></i></a>
                        </div>

                     </div>
                  </div>

               </div>
            </div>

         </div>
      </div>

   </div>
</section>
<a class="btn btn-primary ms-10" href="?menu=tables">Kembali</a>
<script>
   const containerChatBox = document.querySelector('.container-chat');
   const tableChatBody = document.querySelector('.table-chat-body');
   const tableDiscoverFriend = document.querySelector('.table-discover-friend');
   const labelGuestName = document.querySelector('.guest-name');
   const inpMsg = document.getElementById('chat-input');
   const btnSendMsg = document.getElementById('btnSendMsg');
   const chatBoxHeaderForMinimize = document.querySelector('.chatbox');
   const containerTableChat = document.querySelector('.table-chat-body');
   const btnMinimizeChatBox = document.querySelector('.chatbox-icons');
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
               let markupContactsBody = `
               <tr>
                  <th scope="row">${++index}</th>
                  <td class="contact-name" data-nik="${contact[0]}">${contact[1]}</td>
               </tr>`
               containerTableChat.insertAdjacentHTML('beforeend', markupContactsBody)
            })
            break;
         case 'data-message':
            console.log(data);
            containerChatBox.innerHTML = '';
            if (data.relation == 'me') {
               data.message_user.forEach(msg => {
                  if (msg[0] !== '<?= $_SESSION['name']; ?>') {
                     markup = `<div class="message-box-holder">
                                       <div class="message-sender">
                                          ${msg[0]}
                                       </div>
                                       <div class="message-box message-partner">
                                          ${msg[1]} <br>
                                          <small>at ${msg[2]}</small>
                                       </div>
                                    </div>`;
                  } else {
                     markup = `
                     <div class="message-box-holder">
                        <div class="message-box">
                           ${msg[1]}
                        </div>
                     </div>`
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
               markup = `<div class="message-box-holder">
                              <div class="message-box">
                                 ${data.message}
                              </div>
                           </div>`;
               containerChatBox.insertAdjacentHTML('beforeend', markup);
            } else if (currentOpenedChatRoom == data.room_id) {
               markup = `<div class="message-box-holder">
                              <div class="message-sender">
                                 ${data.relation}
                              </div>
                              <div class="message-box message-partner">
                                 ${data.message} <br>
                                 <small>at ${data.date}</small>
                              </div>
                           </div>`;
               containerChatBox.insertAdjacentHTML('beforeend', markup);
            }
            break;
         case 'parsing-new-room':
            console.log(data);
            markup = `<div class="message-box-holder">
                              <div class="message-box">
                                 ${data.message},
                              </div>
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
         type: 'chat-detail-request'
      }
      labelGuestName.innerText = e.target.innerText;
      btnSendMsg.dataset.messageFor = element.dataset.nik;
      chatBoxHeaderForMinimize.classList.remove('chatbox-min');
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
      labelGuestName.innerText = e.target.innerText;
      chatBoxHeaderForMinimize.classList.remove('chatbox-min');
      conn.send(JSON.stringify(data));
   })

   function minimizeChatBoxScreen() {
      chatBoxHeaderForMinimize.classList.toggle('chatbox-min');
   }

   // conn.send(JSON.stringify(data));
</script>