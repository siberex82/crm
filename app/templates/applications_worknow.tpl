<div class="container-fluid">
   <div class="row-fluid">
       <div class="col-md-12">
             <hr class="hr"/>
             
             <ul class="breadcrumb">
              <li><a href="#">Задачи</a> 
              </li>
              
              <li><a href="#">Все задачи</a> 
              </li>

            </ul>
            <hr class="hr"/>
            
            <div class="alert alert-info">
            <i class="fa fa-info-circle" aria-hidden="true"></i>
            <span>Эта страница содержит все задачи и текущие и просроченные, задача не отображается в списке только если исполнитель нажал кнопку "завершить"<br/>
            чем законченную задачу отправляет на проверку пользователю со статусом "директор".</span> 
            
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