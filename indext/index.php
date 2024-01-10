<?php
 include './inc/db.php';
 include './inc/form.php';

 $sql ='SELECT * FROM users  ORDER BY RAND() LIMIT 1';
 $result = mysqli_query($conn,$sql);
 $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
 
 mysqli_free_result($result);
mysqli_close($conn);



?>

<!DOCTYPE html>
<html lang="en" dir ="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>

    <!-- Style code-->
    <style>  
  #countdown{
    color:#0d6efd;
    padding: 10px;

}
#cards{
  display:none;
}
#winner{
  

  
  border: 0;
                    outline: 0;
                    cursor: pointer;
                    color: white;
                    background-color: rgb(84, 105, 212);
                    box-shadow: rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(0 0 0 / 12%) 0px 1px 1px 0px, rgb(84 105 212) 0px 0px 0px 1px, rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(60 66 87 / 8%) 0px 2px 5px 0px;
                    border-radius: 4px;
                    font-size: 14px;
                    font-weight: 500;
                    padding: 4px 8px;
                    display: inline-block;
                    min-height: 28px;
                    transition: background-color .24s,box-shadow .24s;
                    :hover {
                        box-shadow: rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(0 0 0 / 12%) 0px 1px 1px 0px, rgb(84 105 212) 0px 0px 0px 1px, rgb(0 0 0 / 0%) 0px 0px 0px 0px, rgb(60 66 87 / 8%) 0px 3px 9px 0px, rgb(60 66 87 / 8%) 0px 2px 5px 0px;
                    }
                
}
  
.list-group-item{
  background:transparent;

}

  img{
    max-width: 100%;
  }
     


  </style>

    <!--End Style code-->


</head>
<body>

<div id="Madd"></div>

<div class="container">
<div class="position-relative  text-center ">
  <div class="col-md-5 p-lg-5 mx-auto">
    <img src="images/m1.jpg" alt="">
    <h1 class="display-4 font-weight-normal">اربح مع مهدي</h1>
    <p class="lead font-weight-normal">باقي على فتح التسجيل </p>
    <h3 id="countdown"></h3>
    <p class="lead fw-normal">للسحب على الرابح بالنسخة المجانية من البرنامج </p>
    <div class="container">
    <ul class="list-group list-group-flush">
  <li class="list-group-item">تابع البث المباشرعلى صفحتي على الفيسبوك بالتاريخ المذكور اعلاه</li>
  <li class="list-group-item">سأقوم ببث مباشر لمدة ساعه عبارة عن اسئلة وأجوبة حرة للجميع</li>
  <li class="list-group-item">خلال فترة الساعة سيتم فتح صفحة التسجيل هناحيث ستقوم بتسجيل اسمك و إميلك</li>
  <li class="list-group-item">بنهاية البث سيتم اختيار اسم واحدمن قاعدة البيانات بشكل عشوائي</li>
  <li class="list-group-item">الرابح سيحصل على نسخة مجانية من برنامج كامتازيا</li>
</ul></div>

  </div>
</div>
</div>


<div class="position-relative  text-center t">
  <div class="col-md-5 p-lg-5 mx-auto my-5">


<form action="index.php" method='POST'>
    <h3>الرجاء ادخل معلوماتك </h3>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">الاسم الاول</label>
    <input type="text"name="firstName" class="form-control" id="exampleInputEmail1"value = "<?php echo $firstName ?>"  aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text error"><?php echo $errors ['firstNameError'] ?></div>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">الاسم الاخير</label>
    <input type="text"name="lastName"  class="form-control" id="exampleInputEmail1" value = "<?php echo $lastName ?>" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text error"><?php echo $errors['lastNameError']?></div>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">البريدالالكتروني</label>
    <input type="text" name="emali"  class="form-control" id="exampleInputEmail1" value = "<?php echo $emali ?>" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text error"><?php echo $errors['emaliError'] ?></div>
  </div>








  <button type="submit" class="btn btn-primary">ارسال المعلومات</button>
</form>
</div>
</div>

<!-- Button trigger modal -->
<div class="d-grid gap-2 col-6 mx-auto my-5">
<button type="button" id= "winner" class="btn btn-primary">
 اختيارالرابح
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">الرابح في المسابقة</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php foreach($users as $user): ?>
        <h1 class="display-3 text-center modal-title" id="exampleModalLabel"><?php echo htmlspecialchars( $user['firstName']) . " " . htmlspecialchars( $user['lastName']);?></h1>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</div>






    <div id="cards" class="row mb-3 pb-5">
  
    <center>
          <div class="col-sm-6">
          <div class="card my-2 bg-light">
            <div class="card body">
         <h5 class="card-title"></h5>
          <p class="card-text"><?php echo htmlspecialchars( $user['emali'])?></p>
              </div>
            </div>
        </div>
  </center>
  </div>
    
  <!-- JS Code-->
 <script src="./js/bootstrap.bundle.min.js"></script>
<script >

var countDownDate = new Date("Jan 3, 2024 15:30:00").getTime();
var x = setInterval(function() {
  var counter =  document.querySelector("#countdown");
  var now = new Date().getTime();
  var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  counter.innerHTML = days + "يوم " + hours + "ساعة "
  + minutes + "دقيقة " + seconds + "ثانية ";
  if (distance < 0) {
    clearInterval(x);
    counter.innerHTML = "لقد وصلت متأخرا";
  }
}, 1000);


//اختيار الرابح

const win = document.querySelector("#winner");

var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
  keyboard: false
})

win.addEventListener('click' , function () {

    
    setTimeout(function(){
      myModal.show();
    } , 1000)   
});


</script>





</body>
</html>
