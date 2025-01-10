


<!-- Modal -->
<div 
	class="modal fade" 
	id="exampleModalCenter1" 
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
					<b>Request a quotation</b>
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
						<label class='my-2'>Your name:</label>
						<input 
							type='text' 
							name='name' 
							id='request-name'
							placeholder='eg. Karabo Ken Motlhabi'/>
						<p class='name-err text-danger my-2'></p>
							
						<label class='my-2'>Business Name</label>
						<input 
							type='text' 
							name='b_name' 
							id='request-b_name'
							placeholder='e.g Kikinho restaurant'/>
						<p class='b_name-err text-danger my-2'></p>
							
						<label class='my-2'>Business Number or Email</label>
						<input 
							type='text' 
							name='b_number' 
							id='request-b_number'
							placeholder='e.g 053 994 2361 or karabo@gmail.com'/>
						<p class='b_number-err text-danger my-2'></p>
						
							
						<label class='my-2'>Business Type</label>
						<input 
							type='text' 
							name='b_type' 
							id='request-b_type'
							placeholder='e.g Restaurant'/>
						<p class='b_type-err text-danger my-2'></p>
							
						<label class='my-2'>Services/Products</label>
						<input 
							type='text' 
							name='services' 
							id='request-services' 
							placeholder='e.g Food, Accommodation, etc'/>
						<p class='b_services-err text-danger my-2'></p>
						
						<strong class='my-3'>Type of website</strong>		
							
						<label>Simple website</label>
						<input type='radio' name='website_type' class='request-website' value='Simple website' checked />
						<label>Normal website</label>
						<input type='radio' name='website_type' class='request-website' value='Normal website'/>	
						<label>Custom website</label>
						<input type='radio' name='website_type' class='request-website'  value='Custom website'/>	
					</div>
					
					<div class="modal-footer">
						<button 
							type="button" 
							class="btn btn-danger" 
							data-dismiss="modal">
							Close
						</button>
						<button 
							id="need-a-website" 
							name='request_quotation' 
							class="btn btn-success">
							Request a quotation
						</button>
					</div>
			</form>
    </div>
  </div>
</div>
