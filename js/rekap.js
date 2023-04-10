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

function showSkripsiLulus(tahun) {
	var inner = 'listSkripsi';
	var url = 'get_SkripsiLulus.php?tahun='+ tahun;
	callAjax(url,inner);
}
function showSkripsiBelum(tahun) {
	var inner = 'listSkripsi';
	var url = 'get_SkripsiBelum.php?tahun='+ tahun;
	callAjax(url,inner);
}
