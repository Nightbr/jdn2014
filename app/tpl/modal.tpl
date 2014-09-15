<!--- LAPINOU MODAL , le modal -->
<div class="modal-dialog" id="myModal" >
 <div class="modal-content">
   <div class="modal-header">
     <button type="button" class="close button-close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h4>{{title}}</h4>
   </div>
   <div class="modal-body">
   <p> Il y a {{count}} inscrit(s) dans cette liste.</p>
      <ul>
      {{#guests}}
        <li>{{firstname}} {{lastname}}</li>
      {{/guests}}
      </ul>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-default button-close" data-dismiss="modal">Fermer</button>

   </div>
 </div>
</div>
<!---fin LAPINOU MODAL , le modal -->