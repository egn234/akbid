<script type="text/javascript">
	$(document).ready(function() {
		$('#myModal').on('show.bs.modal', function(e) {
			var rowid = $(e.relatedTarget).data('id');
			//menggunakan fungsi ajax untuk pengambilan data
			$.ajax({
				type: 'post',
				url: '<?= base_url() ?>page/modal_detail',
				data: 'rowid=' + rowid,
				success: function(data) {
					$('.fetched-data').html(data); //menampilkan data ke dalam modal
				}
			});
		});
	});
</script>
