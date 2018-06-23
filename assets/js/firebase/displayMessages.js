var taskList = document.getElementById('TaskList');

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
    var picUrl="https://www.practicepanther.com/wp-content/uploads/2017/02/user.png";
    var time="9.45 am";
    var count=3;
    displayTask(child.key,tasks[child.key]["name"],tasks[child.key]["user"],picUrl,time,count);
  });
};



var chatRef=firebase.database().ref("acceptedTasks");
chatRef.limitToLast(12).on('child_added', setTask);
chatRef.limitToLast(12).on('child_changed', setTask);

var taskTemplete =
'<li class="left clearfix" >'+
                 '<span class="chat-img pull-left">'+
                 '<img src="" alt="User Avatar" class="img-circle TaskListUserPic">'+
                 '</span>'+
                                '<div class="chat-body clearfix">'+
                                    '<div class="header_sec">'+
                                        '<strong class="primary-font TaskListTaskName">  </strong> <strong class="pull-right TaskListUpadatedTime">'+
                                            '  </strong>'+
                                    '</div>'+
                                    '<div class="contact_sec">'+
                                        '<strong class="primary-font TaskListUserName">  </strong> <span class="badge pull-right TaskListNewMassegeCount">  </span>'+
                                    '</div>'+
                                '</div>'+
                            '</li>';

var displayTask = function(key,name,user,picUrl,time,count) {
  var Atask = document.getElementById(key);
  // If an element for that message does not exists yet we create it.
  if (!Atask) {
    var Atask = document.createElement('li');
    Atask.innerHTML = taskTemplete;
    //div = container.firstChild;
    Atask.setAttribute('class', "left clearfix");
    Atask.setAttribute('id', key);
    taskList.appendChild(Atask);
  }
  Atask.querySelector('.TaskListTaskName').textContent = name;
  Atask.querySelector('.TaskListUserName').textContent = user;
  Atask.querySelector('.TaskListUpadatedTime').textContent = time;
  Atask.querySelector('.TaskListNewMassegeCount').textContent = count;
  Atask.querySelector('.TaskListUserPic').setAttribute("src",picUrl);

  // Show the card fading-in and scroll to view the new message.
  setTimeout(function() {div.classList.add('visible')}, 1);
  this.messageList.scrollTop = this.messageList.scrollHeight;
  this.messageInput.focus();
};
