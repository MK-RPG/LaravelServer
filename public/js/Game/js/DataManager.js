var DataManager = function($){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    var collectedCoins = 0;

    return{
        getHightScore:function (fn) {
            $.get('getscore',function(data){
                collectedCoins = data;
                console.log(collectedCoins,'collectedCoins')
                fn(data);
            });
        },
        getInternalData:function () {
            return collectedCoins;
        },
        postHighscore: function (collectedCoins) {
            console.log(collectedCoins)
            $.post('postscore',{collectedCoins:collectedCoins},function(){
                console.log('Data sent');
            });
        }
    }
}(jQuery);