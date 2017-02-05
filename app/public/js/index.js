(function() {
	setTimeout(function() {
		$('button.addTask').on("click", function() {
			$('.formAddTask').slideToggle("slow");
			hideEditForm();
		});

		$('.perviewTask').on("click", function() {
			preview($('.formAddTask'), $('.task_preview'));
		});

		$('.closeEditTask').on("click", function() {
			$('.formEditTask').slideToggle("slow");
		});

		function hideEditForm() {
			var formEditTask = $('.formEditTask');
			if(formEditTask.css('display') == 'block') {
				formEditTask.toggle("none");
			}
		}

		function preview(form, task_preview) {
			var showPreview = false,
				fields = {
		        	'task_description' : 'input', 
		        	'status' : 'checked', 
		        	'user' : 'input', 
		        	'email' : 'input'
        		};

			if($("#uploadImage")[0]['value']) {
				var oFReader = new FileReader();
			
				oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
		        oFReader.onload = function (oFREvent) {
		            document.getElementById("uploadPreview").src = oFREvent.target.result;
		        };
			}

	        $.each(fields, function(nameField, typeField) {
	        	var field = $('.'+nameField, task_preview);
	        	
	        	if(typeField == 'input') {
	        		var inputValue = $('[name='+nameField+']', form).val();
	        		field.text( nameField == 'email' ? '('+inputValue+')' : inputValue );

	        		if(inputValue && nameField == 'user') {
        				showPreview = true;
	        		}
	        	} else {
	        		field.text($('[name="'+nameField+'"]:checked', form).val() ? 'Done' : '');
	        	}
	        });

	        if(showPreview) {
	        	$('.task_preview').slideToggle("slow");
	    	}
		}
	}, 0);
})();