<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Generator</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/mainCore.css">
</head>

<body>



<!--a style="color:#FFF;" href="http://fusion.loc/generator/logout/">ВЫЙТИ</a>
<center><h2 style="color:#FFF;">Generator</h2></center>

<img class="fusion_logo" src="images/logo.png" alt=""/-->

<a class="generator-link-logout" href="http://fusion.loc/generator/logout/">
  <i class="fa fa-sign-out" aria-hidden="true"></i> 
  <center>ВЫЙТИ</center>
</a> 


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="generator-top-box">
                <img class="generator-logo" src="images/logo.png" alt=""/>
            </div>
            
            
            <hr class="hr"/>
        </div>
    </div>
</div>




<div class="container">
   <div class="row">
      <div class="col-md-4">
         <div class="generator-menu">
            <div class="generator-info">
               <i class="fa fa-info-circle fa-2x generator-info-circle"></i>
               <p>
                 Будут сгенерированы: контроллер и экшен с классами соответствующими именам своих файлов, с базовыми методами __construct().</p><p> Для генерации дополнительных функций нужно задать имена методов в 2 и 3 полях. 
               </p>
            </div>
         </div>
      </div>
      
      <div class="col-md-8">
          
          <div class="row">
              <div class="col-md-12">
                 <div class="generator-top">
                       
                 </div>
              </div>
          </div>
          
          
          <div class="row">
              <div class="col-md-12"> 
                  <div class="generator-content">
                         <form method="post" action="">
                          <div class="form-group">
                            <label for="inputControllerName">Имя класса, контроллера, экшена</label>
                            <input type="text" class="form-control" id="inputControllerName" name="inputControllerName" required placeholder="Пример: cart">
                          </div>
                          
                          
                          <div class="form-group">
                            <label for="inputControllerMethodName">Создать в контроллере дополнительный метод с именем:</label>
                            <input type="text" class="form-control" id="inputControllerMethodName" name="inputControllerMethodName" placeholder="Пример: cartClear">
                          </div>
                          
                          
                          <div class="form-group">
                            <label for="inputActionMethodName">Создать в экшене дополнительный метод с именем:</label>
                            <input type="text" class="form-control" id="inputActionMethodName" name="inputActionMethodName" placeholder="Пример: cartClear">
                          </div>
                          
                          <!--div class="checkbox">
                            <label>
                              <input type="checkbox"> Запомнить
                            </label>
                          </div-->
                          <input type="hidden" name="token" value=""/>
                        
                          <button type="submit" name="generatorformsubmit" class="btn btn-default generator-submit-btn">создать</button>
                        </form>
                  </div>
              </div>
          </div>

      </div>
   </div>
</div>

</body>
</html>
