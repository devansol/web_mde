$(document).ready(function(){

	var tbl_search_barang = $('#tbl-search-barang').DataTable();
	var tbl_edit_barang = $('#tbl-edit-barang').DataTable();


	$('#tbl-edit-barang_filter').addClass('pull-right');
	$('#tbl-edit-barang_paginate').addClass('pull-right');
	var base_url = $('#inp-base-url').val();
	console.log(base_url);
	get_kode_barang();
	get_produk();
	var value =0 ;
	// $(".dropwdown-menu").hide();

	// $(".dropwdown-toggle").on('click', function(){
	// 	if(value == 0){
	// 		value = 1;
	// 		$(".dropwdown-menu").show();
	// 	}else{
	// 		value = 0;
	// 		$(".dropwdown-menu").hide();
	// 	}
	// });

	$("#btn-kembali-edit").on('click', function(){
		window.location.href=base_url+"admin/edit";
	});

	$('form#data').on('submit', function(e){
		var nama_barang = $("#inp-nama-barang").val();
		var gambar = $('#inp-gambar-barang').val();
		var harga = accounting.unformat($('#inp-harga-barang').val(), ".");
		var ket = $('#txt-keterangan').val();

		if(nama_barang.length == 0 || gambar.length == 0 || harga.length == 0 || ket.length == 0){
			$('.add').addClass('kotak-error');
			alert('harap lengkapi form terlebih dahulu !');
			return false;
		}else{
			e.preventDefault();    
			var formData = new FormData(this);
			alert_confirm('Anda yakin ingin menyimpan data ini ? ', function(){
				upload(formData);
			});
		}
	});

	$('#inp-username').on('blur', function(){
		if($(this).val().length != 0){
			$('#inp-username').removeClass('kotak-error');
			$('#err-username').html('').prop('hidden', true).removeClass('text-error');
		}else{
			$('#inp-username').addClass('kotak-error');
			$('#err-username').html('Username tidak boleh kosong !').prop('hidden', false).addClass('text-error');
		}
	});

	$('#inp-password').on('blur', function(){
		if($(this).val().length != 0){
			$('#inp-password').removeClass('kotak-error');
			$('#err-password').html('').prop('hidden', true).removeClass('text-error');
		}else{
			$('#inp-password').addClass('kotak-error');
			$('#err-password').html('Password tidak boleh kosong !').prop('hidden', false).addClass('text-error');
		}
	});

	$('#btn-login').on('click', function(){
		var username = $('#inp-username').val();
		var password = $('#inp-password').val();
		if(username.length == 0 || password.length == 0){
			$('#inp-username').addClass('kotak-error');
			$('#err-username').html('Username tidak boleh kosong !').prop('hidden', false).addClass('text-error');
			$('#inp-password').addClass('kotak-error');
			$('#err-password').html('Password tidak boleh kosong !').prop('hidden', false).addClass('text-error');
		}else if(username.length == 0){
			$('#inp-username').addClass('kotak-error');
			$('#err-username').html('Username tidak boleh kosong !').prop('hidden', false).addClass('text-error');
		}else if(password.length == 0){
			$('#inp-password').addClass('kotak-error');
			$('#err-password').html('Password tidak boleh kosong !').prop('hidden', false).addClass('text-error');
		}else{
			login_admin(username, password);
		}
		
	});

	$('#btn-lihat-produk').on('click', function(){
		alert_info('test');
	});

	$('#btn-cari-barang').on('click', function(){
		var value = $('#inp-cari-barang').val();
		search_barang(value);
	});

	$("#btn-logout").on('click', function(){
		alert_confirm('Anda yakin ingin logout ?', function(){
			window.location.href=base_url + "controller_admin/logout";
		})
	});

	$('#btn-tambah-data').on('click', function(){
		window.location.href=base_url + "admin/add_product";
	});

	$('#btn-kembali').on('click', function(){
		window.location.href=base_url + "admin/dashboard";
	});

	$("#tbl-edit-barang").on('click','#btn-edit-search', function(){
		var row = $(this).parents('tr');
		var result = tbl_edit_barang.row(row).data();
		var id = result[3];
		console.log(id);
	});

	$("#tbl-edit-barang").on('click','#btn-hapus-search', function(){
		var row = $(this).parents('tr');
		var result = tbl_edit_barang.row(row).data();
		var id = result[3];
		alert_confirm('Anda yakin ingin menghapus data ini ?', function(){
			hapus_barang(id);
		});
		console.log(id);
	});

	$('#tbl-search-barang tbody').on('click', '#btn-detail-search', function(){
		var row = $(this).parents('tr');
		var result = tbl_search_barang.row(row).data();
		var id = result[3];
		window.location.href = base_url + "home/detail_product/"+result[4];
		console.log(id);
	});

	$('#inp-harga-barang').on('blur', function(){
		$(this).val(accounting.formatMoney($(this).val(), '', 2, ',', '.'));
	})
	
	$('#inp-harga-barang').on('focus', function(){
		$(this).val(accounting.unformat($(this).val(), "."));
	})

	$("#btn-edit-data").on('click', function(){
		window.location.href = base_url + "admin/edit";
	});

	$('#tbl-edit-barang tbody').on('click', '#btn-edit-search', function(){
		var row = $(this).parents('tr');
		var result = tbl_edit_barang.row(row).data();
		var id = result[3];
		window.location.href = base_url + "edit/"+result[3];
		console.log(id);
	});

	$('#btn-update').on('click', function(){
		var nama_barang = $("#inp-nama-barang").val();
		var harga = accounting.unformat($('#inp-harga-barang').val(), ".");
		var ket = $('#txt-keterangan').val();
		var id = $('#inp-id-barang').val();
		alert_confirm('Anda yakin ingin mengubah data ini ? ', function(){
			update(nama_barang, harga, ket, id);
		});
	});

	function update(nama_barang,harga,ket,id){
		$.ajax({
			url: base_url + "controller_admin/update",
			data : {
				nama_barang,
				harga,
				ket,
				id
			},
			type: 'POST',
			async : false,
			success:function(response,status,error) {
				try{
					console.log(response);
					if(response == true){
						alert('Data berhasil di diubah', function(){
							location.href = base_url + 'admin/edit';
						});
					}else{
						alert(response['error']);
					}
				}catch(e){
					alert(e.message);
					console.log(e.message);
				}	
			},
			error: function(response){
				if(response['status'] == 500){
					alert(response['statusText']);
				}
				console.log(response);
			}
		});
	}

	function upload(formData){
		$.ajax({
			url: base_url + "controller_admin/insert",
			type: 'POST',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success:function(response,status,error) {
				try{
					console.log(response);
					if(response == true){
						alert('Data berhasil di simpan', function(){
							location.reload('refresh');
						});
					}else{
						alert(response['error']);
					}
				}catch(e){
					alert(e.message);
					console.log(e.message);
				}	
			},
			error: function(response){
				if(response['status'] == 500){
					alert(response['statusText']);
				}
				console.log(response);
			}
		});
	}

	function get_produk(){
		$.ajax({
			url: base_url + "controller_function/get_produk",
			data:{
			},
			async : false,
			type: "POST",
			success:function(response,status,error) {
				try{
					console.log(response);
					tbl_search_barang.clear().draw();
					$.each(response, function(index){
						tbl_search_barang.row.add([
							index+1,
							this['nama_barang'],
							'Rp. '+accounting.formatMoney(this['harga_barang'], '', 2, ',', '.'),
							'<a href="#" id="btn-detail-search"><span class = "fa fa-eye"></span></a>',
							this['id_barang']
							]).draw(false);
					});

					$.each(response, function(index){
						tbl_edit_barang.row.add([
							index+1,
							this['nama_barang'],
							'<a href="#" id="btn-edit-search"><span class = "fa fa-edit"></span> Edit</a> <a href="#" id="btn-hapus-search"><span class = "fa fa-eraser"></span> Hapus</a>',
							this['id_barang']
							]).draw(false);
					});
				}catch(e){
					alert(e.message);
					console.log(e.message);
				}	
			},
			error: function(response){
				if(response['status'] == 500){
					alert(response['statusText']);
				}
				console.log(response);
			}
		});
	}

	function search_barang(value){
		$.ajax({
			url: base_url + "controller_function/search_produk",
			data:{
				value
			},
			async : false,
			type: "POST",
			success:function(response,status,error) {
				try{
					console.log(response);
					tbl_search_barang.clear().draw();
					$.each(response['data'], function(index){
						tbl_search_barang.row.add([
							index+1,
							this['nama_barang'],
							'<a href="#" id="btn-detail-search"><span class = "fa fa-eye"></span></a>',
							this['id_barang']
							]).draw(false);
					});
					window.location.href = base_url + "search";	
				}catch(e){
					alert(e.message);
					console.log(e.message);
				}	
			},
			error: function(response){
				if(response['status'] == 500){
					alert(response['statusText']);
				}
				console.log(response);
			}
		});
	}

	function login_admin(username, password){
		$.ajax({
			url: base_url + "controller_admin/login_admin",
			data:{
				username,
				password
			},
			async : false,
			type: "POST",
			success:function(response,status,error) {
				try{
					console.log(response);
					if(response['status'] == true) {
						alert('Selamat datang ' + response['logged_in'], function(){
							window.location.href = base_url + 'admin/dashboard';
						});
						
					}else{
						alert('Username / Password Salah !');
					}
				}catch(e){
					alert(e.message);
					console.log(e.message);
				}	
			},
			error: function(response){
				if(response['status'] == 500){
					alert(response['statusText']);
				}
				console.log(response);
			}
		});
	}

	function hapus_barang(id){
		$.ajax({
			url: base_url + "controller_admin/delete_barang",
			data:{
				id
			},
			async : false,
			type: "POST",
			success:function(response,status,error) {
				try{
					console.log(response);
					if(response == true) {
						alert('Data berhasil di hapus !', function(){
							location.reload('refresh');
						});
					}
					
				}catch(e){
					alert(e.message);
					console.log(e.message);
				}	
			},
			error: function(response){
				if(response['status'] == 500){
					alert(response['statusText']);
				}
				console.log(response);
			}
		});
	}

	function get_kode_barang(){
		$.ajax({
			url: base_url + "controller_admin/get_kode_barang",
			data:{},
			async : false,
			type: "POST",
			success:function(response,status,error) {
				try{
					console.log(response);
					$('#inp-kode-barang').val(response['kode_barang']);
				}catch(e){
					alert(e);
					console.log(e.message);
				}
			},
			error: function(response){
				if(response['status'] == 500){
					alert(response['statusText']);
				}
				console.log(response);
			}
		});
	}

	function alert(message, callback) {
		$('.modal-backdrop').css('display', 'none');
		$('#modal-alert').modal('show');
		$('#modal-alert-title').html('Info');
		$('#btn-no').html('OK');
		$('#btn-yes').hide();
		$('#modal-alert-message').html(message);
		$('#modal-alert-icon').removeClass('fa-times-circle').removeClass('fa-exclamation-triangle').removeClass('fa-question-circle').addClass('fa-info-circle');
		$('.fa-info-circle').css('color', '#31708f');
		$('#btn-no').trigger('focus');
		$('#btn-no').off('click').on('click', function() {
			$('#modal-alert').modal('hide');
			$('.modal-backdrop').css('display', 'none');
			$('html, body').css('padding-right', '0px');
			if (typeof callback === 'function') {
				callback();
			}
		});
	}

	function alert_confirm(message, callback) {
		$('#modal-alert').modal('show');
		$('#modal-alert-title').html('Konfirmasi');
		$('#btn-yes').show();
		$('#btn-yes').prop('disabled', false);
		$('#btn-no').html('Tidak');
		$('#modal-alert-message').html(message);
		$('#modal-alert-icon').removeClass('fa-info-circle').removeClass('fa-exclamation-triangle').removeClass('fa-times-circle').addClass('fa-question-circle');
		$('.fa-question-circle').css('color', '#3c763d');
		$('#btn-yes').trigger('focus');
		$('#btn-yes').off('click').on('click', function() {
			$('#modal-alert').modal('hide');
			if (typeof callback === 'function') {
				callback();
			}
		});
		$('#btn-no').off('click').on('click', function() {
			$('#modal-alert').modal('hide');
		});
	}
});