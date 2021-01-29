const flashData = $('.flash-data').data('flashdata');
if (flashData) {
	Swal.fire({
		title: flashData + ' sukses',
		text: '',
		type: 'success'
	});
}


const notif=$('.notif').data('flashdata');
if (notif) {

Swal.fire({
		title: notif,
		text: '',
		type: 'error'
	});


}

const berhasil=$('.berhasil').data('flashdata');
if (berhasil) {

Swal.fire({
		title: berhasil,
		text: '',
		type: 'success'
	});


}
