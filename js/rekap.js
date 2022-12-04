function showPKLLulus(tahun) {
	var inner = 'listPKL';
	var url = 'get_PKLLulus.php?tahun='+ tahun;
	callAjax(url,inner);
}
function showPKLBelum(tahun) {
	var inner = 'listPKL';
	var url = 'get_PKLBelum.php?tahun='+ tahun;
	callAjax(url,inner);
}