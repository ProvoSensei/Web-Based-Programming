	function insert()
    {
      let task
      let thread

      task = document.getElementById("isi_komen").value
      id_thread = document.getElementById("id_thr").value

      let ajax = new XMLHttpRequest()
      ajax.open("GET", "../PHP/proses.php?action=insert&isi_komen="+task+"&id="+id_thread, true)
      ajax.send()
      ajax.onload = function() 
      {
        if (this.readyState == 4 && this.status == 200)
        {
	           if (this.responseText == 200) 
	           {
	               alert('Berhasil Komen')
	               display()
	            }
	            else
	          	{
	            	location.assign('Login.php')
	          	}
	      	}
	    }
	}

	function display()
	{
	    let ajax = new XMLHttpRequest()
	    ajax.open("GET","proses.php?action=select", true)
	    ajax.send()
	    ajax.onload = function()
	    {
	        if (this.readyState == 4 && this.status == 200)
	        {
		        if (this.responseText != 404) 
		        {
		            document.getElementById("tampilkankomen").innerHTML = this.responseText
		        }
		        else
		        {
		            document.getElementById("tampilkankomen").innerHTML = "Data Kosong"
		        }
	        }
	    }
	}

	function delete_komentar(id)
	{
	    let ajax = new XMLHttpRequest()
	    ajax.open("GET","proses.php?action=remove&tampilkankomen="+id, true)
	    ajax.send()
	    ajax.onload = function()
	    {
	        if (this.readyState == 4 && this.status == 200)
	        {
		        if (this.responseText != 404) 
		        {
		        	display()
		        }
		        else
		        {
		        	alert('Tidak bisa menghapus komen orang lain')
		        }
	        }
	    } 
	}

	function deleteThread(id) 
	{
		let ajax = new XMLHttpRequest()
	    ajax.open("GET","deletethread.php?tampilkanthread="+id, true)
	    ajax.send()
	    ajax.onload = function()
	    {
	        if (this.readyState == 4 && this.status == 200)
	        {
		        if (this.responseText != 404) 
		        {
		            location.assign('index login.php')
		        }
		        else
		        {
		        	alert('Tidak bisa menghapus thread orang lain')
		        }
	        }
	    } 
	}
		// var url = "deletethread.php?id="+id;

		// req.open("GET", url, true);
		// req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		// req.onreadystatechange = function() {
		//     if(req.readyState == 4 && req.status == 200) {
		//         display();
		//     }
		// }
		// req.send(null);