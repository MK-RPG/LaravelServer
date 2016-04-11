var DataManager = function($){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    var score = 0;

    return{
        getHightScore:function (fn) {
            $.get('getscore',function(data){
                score = data;
                console.log(score,'score')
                fn(data);
            });
        },
        getInternalData:function () {
            return score;
        },
        postHighscore: function (scores) {
            console.log(scores)
            $.post('postscore',{score:scores},function(){
                console.log('Data sent');
            });
        }
    }
}(jQuery);