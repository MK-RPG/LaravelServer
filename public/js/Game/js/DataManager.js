var DataManager = function(){

    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    })
    var collectedCoins = 0;

    return{
        getGold:function (fn) {
            $.get('getscore',function(data){
                collectedCoins = data;
                console.log(collectedCoins,'collectedCoins')
                fn(data);
            });
        },
        getInternalData:function () {
            return collectedCoins;
        },
        postGold: function (collectedCoins) {
            console.log(collectedCoins)
            $.post('postscore',{collectedCoins:collectedCoins},function(){
                console.log('Data sent');
            });
        },
        uploadScore: function(collectedCoins) {
                console.log(collectedCoins);
            $_token = "{{ csrf_token() }}";
            $.post('/postscore',{gold:collectedCoins, _token: $_token},function(){
                console.log('success');
            });
        }
    }
}();