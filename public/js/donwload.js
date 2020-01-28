

let app_ = document.getElementById('app')


        $('#close_head_movil').click(function(){
            $('.head_movil_claro').slideUp();
            app_.setAttribute('class' , 'layout')
        });

        /*--mobile detect--*/
        var md = new MobileDetect(window.navigator.userAgent);
        console.log( md.mobile() );          // 'Sony'
        let phone =  md.phone();           // 'Sony'
        let android =  md.os( );              // 'AndroidOS'
        console.log( md.is('iPhone') );      // false
        console.log( md.version('Webkit') );         // 534.3

        let hr = document.getElementById('detect')

        if(phone  === 'iPhone'){
            let a = hr.setAttribute('href' , 'https://itunes.apple.com/pe/app/claro-club/id1343890516?mt=8')
        }
        if( android === 'AndroidOS'){
            let a = hr.setAttribute('href' , 'https://play.google.com/store/apps/details?id=com.claro.claroclub')
        }