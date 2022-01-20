$(document).ready(() => {
	let currentLocation = window.location.pathname.split("/")[4];
	$('nav a[href^="/' + currentLocation + '"]').addClass("active");
	let deleteButton = document.querySelectorAll(".btn-delete");
	deleteButton.forEach((button) => {
		button.addEventListener("click", (event) => {
			event.preventDefault();
			let id = button.getAttribute("data-id");
			Swal.fire({
				title: "Apakah kamu yakin?",
				html: `Kamu akan menghapus data dengan id = <strong> ${id} </strong> `,
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Gaskeun!",
				cancelButtonText: "Batal",
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: button.getAttribute("href"),
						method: "POST",
						data: {
							id: id,
						},
						success: (response) => {
							console.log(response);
							if (response === "ok") {
								Swal.fire({
									title: "Deleted!",
									html: `Data dengan id = <strong> ${id} </strong> telah dihapus.`,
									icon: "success",
								}).then((result) => {
									if (result.isConfirmed) {
										location.reload();
									}
								});
							}
						},
					});
				}
			});
		});
	});

	//form on submit
	$("#form").submit(function (event) {
		event.preventDefault();
		let form = $(this);
		let url = form.attr("action");
		let data = form.serialize();
		$.ajax({
			url: url,
			method: "POST",
			data: data,
			dataType: "JSON",
			success: (response) => {
				if (response.status === "ok") {
					Swal.fire({
						title: "Success!",
						html: response.message,
						icon: "success",
					}).then((result) => {
						if (result.isConfirmed) {
							location.reload();
						}
					});
				} else {
					Swal.fire("Anda tidak merubah data apapun!");
				}
			},
			error: (response) => {
				console.log(response);
				Swal.fire({
					title: "Error!",
					html: "NIM telah digunakan",
					icon: "error",
				});
			},
		});
	});

	$(".btn-insert").click((event) => {
		event.preventDefault();
		$("#modalTitle").html("Tambah Data User");
		$(".modal-footer button[type=submit]").html("Tambah Data");
		$("#form").attr(
			"action",
			"http://localhost/php/mvc/public/user/tambah"
		);
		//clear form value
		$("#form")[0].reset();
		$("#nim").attr("readonly", false);
	});

	let editButton = document.querySelectorAll(".btn-edit");
	editButton.forEach((button) => {
		button.addEventListener("click", (event) => {
			event.preventDefault();
			$("#modalTitle").html("Ubah Data User");
			$(".modal-footer button[type=submit]").html("Ubah Data");
			$("#form").attr(
				"action",
				"http://localhost/php/mvc/public/user/ubah"
			);
			let id = button.getAttribute("data-id");
			$.ajax({
				url: "http://localhost/php/mvc/public/user/getDataUbah",
				method: "POST",
				data: {
					id: id,
				},
				dataType: "json",
				success: (response) => {
					$("#id").val(response.ID);
					$("#nama").val(response.NAMA);
					$("#nim").val(response.NIM);
					$("#prodi").val(response.PRODI);
					$("#nim").attr("readonly", true);
				},
			});
		});
	});
});
