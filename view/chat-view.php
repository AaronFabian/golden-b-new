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
</style>
<div class="container mt-4 me-1">
   <div class="row">
      <div class="col-4">
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">No</th>
                  <th scope="col">Name</th>
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
<div class="chatbox-holder">
   <div class="chatbox">
      <div class="chatbox-top">
         <div class="chatbox-avatar">
            <a target="_blank" href="#"><img src="./src/img/team-1.jpg" /></a>
         </div>
         <div class="chat-partner-name">
            <span class="status online"></span>
            <a target="_blank" href="#" class="guest-name"></a>
         </div>
         <div class="chatbox-icons bg-danger">
            <a href="javascript:void(0);"><i class="fa fa-minus"></i></a>
            <!-- <a href="javascript:void(0);"><i class="fa fa-close"></i></a> -->
         </div>
      </div>

      <div class="chat-messages container-chat">

         <!-- <div class="message-box-holder">
            <div class="message-box">
               There's something important I would like to share with you. Do you have some time?<br>
               <small>at 04.12</small>
            </div>
         </div> -->

         <!-- <div class="message-box-holder">
            <div class="message-sender">
               Someone
            </div>
            <div class="message-box message-partner">
               Yeah sure. Let's meet in the Einstein cafe this evening and discuss the matter. <br>
               <small>at 04.12</small>
            </div>
         </div> -->

         <!-- <div class="message-box-holder">
            <div class="message-sender">
               Someone
            </div>
            <div class="message-box message-partner chatTextarea">
               I thought of coming to your place and discuss about it but I had to finish my projects and I didn't have enough time to go out of the house. <br>
               <small>at 04.12</small>
            </div>
         </div> -->
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
<script>
   const containerChatBox = document.querySelector('.container-chat');
   const tableChatBody = document.querySelector('.table-chat-body');
   const labelGuestName = document.querySelector('.guest-name');
   const inpMsg = document.getElementById('chat-input');
   const btnSendMsg = document.getElementById('btnSendMsg');
   const containerTableChat = document.querySelector('.table-chat-body');

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
            if (data.relation == 'me') {
               containerChatBox.innerHTML = '';
               let markup = '';
               data.message_user.forEach(msg => {
                  markup = `<div class="message-box-holder">
                                    <div class="message-sender">
                                       ${data.relation == 'me' ? 
                                          labelGuestName.innerText : 
                                          msg[0]}
                                    </div>
                                    <div class="message-box message-partner">
                                       ${msg[1]} <br>
                                       <small>at ${msg[2]}</small>
                                    </div>
                                 </div>`;
                  containerChatBox.insertAdjacentHTML('beforeend', markup);
               })
            } else {
               console.log('no message to display.');
            }
            // let markup = ``;
            // if (data.from == 'me') {
            //    markup = `<div class="message-box-holder">
            //       <div class="message-box">
            //          ${data.messageData}<br>
            //          <small>at ${data.dt}</small>
            //       </div>
            //    </div>`;
            // } else {
            //    markup = `<div class="message-box-holder">
            //       <div class="message-sender">
            //          ${data.userId}
            //       </div>
            //       <div class="message-box message-partner">
            //          ${data.messageData} <br>
            //          <small>at ${data.dt}</small>
            //       </div>
            //    </div>`;
            // }
            break;
      }
   };

   // btnSendMsg.onclick = (e) => {
   //    e.preventDefault();

   //    let message = inpMsg.value || 'default';

   //    const data = {
   //       userId: <?= $_SESSION['nik']; ?>,
   //       messageData: message,
   //       type: 'chat-detail-request'
   //    }

   //    // conn.send(JSON.stringify(data));
   // }

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
      conn.send(JSON.stringify(dataRequest));
   })

   // conn.send(JSON.stringify(data));
</script>