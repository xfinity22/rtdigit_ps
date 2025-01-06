$(function(){
	
	$('#example1').priceFormat();
	
	$('#htmlfield').priceFormat();
	
	$('#example2').priceFormat({
		prefix: '',
		centsSeparator: '.',
		thousandsSeparator: ','
	});
	
	$('#example3').priceFormat({
		prefix: '',
		thousandsSeparator: ''
	});
	
	$('#example4').priceFormat({
		limit: 5,
		centsLimit: 3
	});
	
	$('#example5').priceFormat({
		clearPrefix: true
	});
	
	$('#example6').priceFormat({
		allowNegative: true
	});
	
	$('#example7').priceFormat({
		prefix: '',
		suffix: '€'
	});
	
	$('#example9').priceFormat({
		prefix: '',
		thousandsSeparator: '',
		insertPlusSign: true
	});

        $('.language').click(function(){
            var language = this.lang;

            $.get('index.php/changeLanguage', {language : language}, function(data){
                if(data > 0)
                    window.location = '/';
            });

        });

});