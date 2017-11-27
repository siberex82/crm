<div class="container-fluid">
   <div class="row-fluid">
       <div class="col-md-12">
             <hr class="hr"/>
             
             <ul class="breadcrumb">
              <li><a href="#">Задачи</a> 
              </li>
              
              <li><a href="#">Я исполняю</a> 
              </li>

            </ul>
            <hr class="hr"/>
            
            <div class="alert alert-info">
            <i class="fa fa-info-circle" aria-hidden="true"></i>
            <span>Страница со списком ваших личных задач, система контролирует даты окончания и будет заблаговременно сообщать вам о близких к окончанию.</span> 
            
            <div class="clr"></div>
            </div>
            <!--div class="well">
                 dsfdsfdsf  dsafdsf
            </div-->
            
              <table class="table table-striped">
              <thead>
                 <tr><th>Создана</th><th>Название</th><th>Начать с</th> <th>Окончить до</th> <th>Кем поставлена</th> <th>Исполнитель</th> <th>Контролирует</th> <th>Приоритет</th> <th>Управление</th></tr>
              </thead>
              
              <tbody>
                {application}
              </tbody>
            </table>
          
       </div>
   </div>
</div>