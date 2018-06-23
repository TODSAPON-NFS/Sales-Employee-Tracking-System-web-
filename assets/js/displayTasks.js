var taskList = document.getElementById('TaskList');
var currentChat="";
var tasks=new Object();
tasks[""]






var setTask = function(data) {
  var username = data.key;
  data.forEach(function(child){
    var val = child.val();
    tasks[child.key]=new Object;
    tasks[child.key]["user"]=username;
    tasks[child.key]["acceptedDate"]=val.acceptedDate;
    tasks[child.key]["area"]=val.area;
    tasks[child.key]["contactName"]=val.contactName;
    tasks[child.key]["contactNumber"]=val.contactNumber;
    tasks[child.key]["deadline"]=val.deadline;
    tasks[child.key]["description"]=val.description;
    tasks[child.key]["name"]=val.name;

    //document.write("<br>ans: ".concat(username,child.key,tasks[child.key]["acceptedDate"],val.contactName));
    var picUrl="https://d2ln1xbi067hum.cloudfront.net/assets/default_user-abdf6434cda029ecd32423baac4ec238.png";
    var time="";
    var count="";
    displayTask(child.key,tasks[child.key]["name"],tasks[child.key]["user"],picUrl,time,count);
  });
};



var acceptedTaskRef=firebase.database().ref("acceptedTasks");
acceptedTaskRef.limitToLast(12).on('child_added', setTask);
acceptedTaskRef.limitToLast(12).on('child_changed', setTask);

var taskTemplete =
''+
                 '<span class="chat-img pull-left">'+
                 '<img src="" alt="User Avatar" class="img-circle TaskListUserPic">'+
                 '</span>'+
                                '<div class="chat-body clearfix">'+
                                    '<div class="header_sec">'+
                                        '<strong class="primary-font TaskListTaskName">  </strong> <strong class="pull-right TaskListUpadatedTime">'+
                                            '  </strong>'+
                                    '</div>'+
                                    '<div class="contact_sec">'+
                                        '<i class="primary-font TaskListUserName">  </i> <span class="badge pull-right TaskListNewMassegeCount">  </span>'+
                                    '</div>'+
                                '</div>'+
                            '';

var displayTask = function(key,name,user,picUrl,time,count) {
  var taskList = document.getElementById('TaskList');

  var Atask = document.getElementById(key);
  // If an element for that message does not exists yet we create it.
  if (!Atask) {
    var Atask = document.createElement('li');
    Atask.innerHTML = taskTemplete;
    //div = container.firstChild;
    Atask.setAttribute('class', "left clearfix");
    Atask.setAttribute('id', key);
    Atask.setAttribute('onclick',"taskClick('"+key+"')");
    taskList.appendChild(Atask);
  }
  Atask.querySelector('.TaskListTaskName').textContent = name;
  Atask.querySelector('.TaskListUserName').textContent = user;
  Atask.querySelector('.TaskListUpadatedTime').textContent = time;
  Atask.querySelector('.TaskListNewMassegeCount').textContent = count;
  Atask.querySelector('.TaskListUserPic').setAttribute("src",picUrl);
};


function taskClick(taskId){
  var TaskDetailName = document.getElementById('TaskDetailName');
  var TaskDetailDescription = document.getElementById('TaskDetailDescription');
  var TaskDetailDeadline = document.getElementById('TaskDetailDeadline');
  var TaskDetailContactName = document.getElementById('TaskDetailContactName');
  var TaskDetailContactNumber = document.getElementById('TaskDetailContactNumber');
  var TaskDetailArea = document.getElementById('TaskDetailArea');
  var TaskDetailsAcceptedDat = document.getElementById('TaskDetailsAcceptedDat');

  TaskDetailName.textContent=tasks[taskId]["user"];
  TaskDetailsAcceptedDate.textContent=tasks[taskId]["acceptedDate"];
  TaskDetailArea.textContent = tasks[taskId]["area"];
  TaskDetailContactName.textContent = tasks[taskId]["contactName"];
  TaskDetailContactNumber.textContent = tasks[taskId]["contactNumber"];
  TaskDetailDeadline.textContent = tasks[taskId]["deadline"];
  TaskDetailDescription.textContent = tasks[taskId]["description"];
  TaskDetailName.textContent = tasks[taskId]["name"];
  var messsageList = document.getElementById('MessageList');
  MessageList.innerHTML="";
  currentChat="chat/"+taskId;
  var acceptedTaskRef=firebase.database().ref(currentChat);
  acceptedTaskRef.limitToLast(12).on('child_added', setMessage);
  acceptedTaskRef.limitToLast(12).on('child_changed', setMessage);

}

var messageTemplete=
'<span class="chat-img1 pull-left MessageSpanPic">'+
                    '<img src="" alt="User Avatar" class="img-circle MessageSenderPic">'+
                     '</span>'+
                                    '<div class="chat-body1 clearfix">'+
                                        '<strong class="primary-font MessageSender">  </strong>'+
                                        '<p class="MessageContent">  </p>'+
                                        '<div class="chat_time pull-right MessageTime">  </div>'+
                                    '</div>';


var displayMessage = function(key,message,sender,time,picUrl) {
  var messageList = document.getElementById('MessageList');

  var Amessage = document.getElementById(key);
  // If an element for that message does not exists yet we create it.
  if (!Amessage) {
    var Amessage = document.createElement('li');
    Amessage.innerHTML = messageTemplete;

    Amessage.setAttribute('class', "left clearfix");
    Amessage.setAttribute('id', key);
    messageList.appendChild(Amessage);

    if(sender!="Manager"){
      Amessage.querySelector('.MessageSpanPic').setAttribute("class","chat-img1 pull-left MessageSpanPic");
      Amessage.querySelector('.MessageTime').setAttribute("class","chat_time pull-right MessageTime");
    }
    else{
      Amessage.querySelector('.MessageSpanPic').setAttribute("class","chat-img1 pull-right MessageSpanPic");
      Amessage.querySelector('.MessageTime').setAttribute("class","chat_time pull-left MessageTime");
    }
  }
  Amessage.querySelector('.MessageSender').textContent = sender;
  Amessage.querySelector('.MessageContent').textContent = message;
  Amessage.querySelector('.MessageTime').textContent = time;
  Amessage.querySelector('.MessageSenderPic').setAttribute("src",picUrl);

  // Show the card fading-in.
  var chatArea=document.getElementById('chatArea');
  setTimeout(function() {Amessage.classList.add('visible')}, 1);
  chatArea.scrollTop = chatArea.scrollHeight;
  Amessage.querySelector('.MessageContent').focus()
};




var setMessage = function(data) {
  var username = data.key;
  var val=data.val();
  //console.log("asd".concat(data.key,val.message,val.sender,val.time));
  var picUrl="https://d2ln1xbi067hum.cloudfront.net/assets/default_user-abdf6434cda029ecd32423baac4ec238.png";
  displayMessage(data.key,val.message,val.sender,val.time,picUrl);
};


function clickSend(){
  var sendingTextArea=document.getElementById('sendingTextArea');
  console.log(currentChat);
  var theChatRef=firebase.database().ref(currentChat);

  var newMessageRef = theChatRef.push();
  var id = String(newMessageRef.key);
  var ts=new Date();
  var dateTime=ts.toDateString()+" "+ts.toLocaleTimeString();
  theChatRef.child(id).set({
      sender: "Manager",
      message: sendingTextArea.value,
      time: dateTime
    });
}




