function copyToClipBoard() {

    var content = document.getElementById('referal');
    
    content.select();
    document.execCommand('copy');

    //alert("Copied!");


swal("Copied!");
}



function copyWallet() {

    var content = document.getElementById('wallet_address');
    
    content.select();
    document.execCommand('copy');

    //alert("Copied!");


swal("Copied!");
}


    


