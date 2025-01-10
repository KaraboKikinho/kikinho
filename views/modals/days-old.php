
<!-- Modal -->
<div 
	class="modal fade" 
	id="exampleModalCenter" 
	tabindex="-1" 
	role="dialog" 
	aria-labelledby="exampleModalCenterTitle" 
	aria-hidden="true">
  <div 
		class="modal-dialog modal-dialog-centered" 
		role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 
					class="modal-title" 
					id="exampleModalLongTitle">
					Date of birth
				</h5>
        <button 
			type="button" 
			class="close" 
			data-dismiss="modal" 
			aria-label="Close">
          <span aria-hidden="true">
						&times;
					</span>
        </button>
      </div>
	<form method='POST' action='/'>
      <div class="modal-body">
			<h4 id='results'></h4>
        <input type='date' name='calendar' id='calend' />
				<p class='wrong'></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button id="calculate" name='calculate' class="btn btn-primary">
					Calculate
				</button>
      </div>
			</form>
    </div>
  </div>
</div>
