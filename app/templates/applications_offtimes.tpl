<div class="container-fluid">
   <div class="row-fluid">
       <div class="col-md-12">
             <hr class="hr"/>
             
             <ul class="breadcrumb">
              <li><a href="#">Задачи</a> 
              </li>
              
              <li><a href="#">Просроченные задачи</a> 
              </li>

            </ul>
            <hr class="hr"/>
            
             <div class="alert alert-info">
            <i class="fa fa-info-circle" aria-hidden="true"></i>
            <span>Страница содержит просроченные задачи пользователей, доступна пользователям с уровнем доступа "директор" и "помощник директора",<br/> пользователи с особыми доступами имеют возможность возобновить задачу задав новые сроки исполнения при редактировании.</span> 
            
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