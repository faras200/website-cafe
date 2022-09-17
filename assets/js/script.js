
   $(document).ready(function() {
    
    function convertToAngka(rupiah)
    {
      return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
    }
    
    function convertToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}
    
     $("#hitung").click(function() {
       var nilai = $("#input_jml_bayar").val();
       var bayar = convertToAngka(nilai);
       var total = $("#jml_trs").val();
       var kembalian = bayar - total;
       $("#tampil_perhitungan").html("<ul><li>Dibayarkan :"+convertToRupiah(bayar)+"</li><li>Total Transaksi :"+convertToRupiah(total)+"</li><li>Kembalian :"+convertToRupiah(kembalian)+"</li></ul>");
       
     })
  
   });
   