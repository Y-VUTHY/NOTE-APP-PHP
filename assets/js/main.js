// function show and hide element
function showElement(element, isShow) {
  if (isShow) {
    element.style.display = "block";
  }else{
    element.style.display = "none";
  }
}

//--------------------------------------script for homepage-------------------------//
let formAddCourse = document.getElementById("formAddCourse");
if(formAddCourse!=null){
  let btnSubmitToAddCourse = document.getElementById("btnSubmitToAddCourse");
  let btnAddCourse = document.getElementById("btnAddCourse");
  let btnCancelToAddCourse = document.getElementById("btnCancelToAddCourse");
  btnAddCourse.addEventListener("click",function(event){
    event.preventDefault();
    showElement(formAddCourse,true);
    showElement(btnAddCourse,false);
    window.scrollTo({ left: 0, top: document.body.scrollHeight});
  })
  btnCancelToAddCourse.addEventListener("click",function(event){
    event.preventDefault();
    showElement(btnAddCourse,true);
    showElement(formAddCourse,false);
    window.scrollTo({ left: 0, top: document.body.scrollHeight});
  })
  window.scrollTo({ left: 0, top: document.body.scrollHeight});
  showElement(formAddCourse,false);
}
//---------------------------------------------script for lessons -----------------------//
let btnAddNewLesson = document.getElementById("btnAddNewLesson");
if (btnAddNewLesson != null) {
  let btnToCancelToCreateNewLesson = document.getElementById(
    "btnToCancelToCreateNewLesson"
  );
  let formCreateNewLesson = document.getElementById("formCreateNewLesson");
  btnToCancelToCreateNewLesson.addEventListener("click", function () {
    showElement(formCreateNewLesson, false);
    showElement(btnAddNewLesson, true);
  });
  btnAddNewLesson.addEventListener("click", function () {
    showElement(formCreateNewLesson, true);
    showElement(btnAddNewLesson, false);
  });
  showElement(formCreateNewLesson,false);
}
//----------------------------------script for note Area------------------
let btnTakeNote = document.getElementById("btnTakeNote");
if(btnTakeNote!=null){
  let checkSubmit = document.getElementById("checkSubmit");
  let btnGoToTheTop = document.getElementById("btnGoToTheTop");
  let btnInputText = document.getElementById("btnInputText");
  let btnCloseNote = document.getElementById("btnCloseNote");
  let noteInputText = document.getElementById("noteInputText");
  let noteOption = document.getElementById("noteOption");
  btnGoToTheTop.addEventListener("click",function(event){
    event.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  })
  btnCloseNote.addEventListener("click",function(event){
    event.preventDefault();
    showElement(noteOption,false);
    showElement(btnCloseNote,false);
    showElement(btnTakeNote,true);
    showElement(noteInputText,false);
    window.scrollTo({ left: 0, top: document.body.scrollHeight});
  })
  btnTakeNote.addEventListener("click",function(event){
    event.preventDefault();
    showElement(noteOption,true);
    showElement(btnCloseNote,true);
    showElement(btnTakeNote,false);
    window.scrollTo({ left: 0, top: document.body.scrollHeight});
  })
  btnInputText.addEventListener("click",function(event){
    event.preventDefault();
    showElement(noteOption,false);
    showElement(noteInputText,true);

  })
  showElement(noteOption,false);
  showElement(noteInputText,false);
  showElement(btnCloseNote,false);
  console.log(checkSubmit.value);
  if(checkSubmit.value!=""){
    window.scrollTo({ left: 0, top: document.body.scrollHeight});
  }
}