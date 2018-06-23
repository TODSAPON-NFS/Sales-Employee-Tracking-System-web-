function isValideTaskDetails() {
  //todo: write validation rules
  return true;
};

function submitClick() {
  var taskName = document.getElementById("text_name");
  var taskArea = document.getElementById("text_area");
  var taskContactName = document.getElementById("text_contact_name");
  var taskContactNumber = document.getElementById("t1");
  var taskDeadlineDate = document.getElementById("date_deadLine");
  var taskDescription = document.getElementById("textarea_description");

  if (isValideTaskDetails()) {//if validated add to firebase realtime database
    var firebaseref = firebase.database().ref("availableTasks");
    var newPostRef = firebaseref.push();
    var id = String(newPostRef.key);
    var overviewRef = firebase.database().ref("OverviewAvailableTask");
    //adding overview which is needed for availableTasklist
    overviewRef.child(id).set({
      id: id,
      name: taskName.value,
      area: taskArea.value,
    });
    //adding other details which is needed for deatiledTaskView
    newPostRef.set({
      id: id,
      contactName: taskContactName.value,
      contactNumber: taskContactNumber.value,
      deadline: taskDeadlineDate.value,
      description: taskDescription.value
    });
    window.alert("task successfully added.");
  }
}
