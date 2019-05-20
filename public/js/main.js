var APP = APP || {};

var main = (function(APP, win, $, undefined) {
  "use strict";

  var st = {
    list1: '#list1',
    list2: '#list2',
    list3: '#list3',
    list4: '#list4',
    list5: '#list5',
    menu: '.top_layout__main .content .content__menu',
    close: '.top_layout__main .content .content__header .buttons .close .close__icon',
    header: '.top_layout__header',
    sesion: '.layout__header .section1__header .sesion',
    navigation : '.layout__header .section1__header .navigation'
  };

  var mediaquery = win.matchMedia("(max-width: 426px)");



  
  //var first = false;

  


  var dom = {};

  var page;


  let URLactual = window.location.href 
  let  rute = URLactual


  

  var columnasDesktop = 2
  var columnasMobile = 1



  var medida = (screen.width) 
  console.log(medida , rute)

  if (medida < 650) {
    
      columnasDesktop = columnasMobile
  }
  
  if(rute.includes('buscar')) {
    let search_products = document.getElementById('search_products')
    let value = search_products.textContent
    let search_value = parseInt(value,10)
    if (search_value === 0 ) {
      $('.layout__main .page2__main .section4__main .without_products').addClass('active')
      $('.layout__main .page2__main .section4__main .title').css('display' , 'none') 
      $('.layout__main .page2__main .section1__align#search_header .section1__header .title').css('display' , 'none')  }
  }




  $('.usetype').on('click', function () {
    $(this).toggleClass('active');
  })

  $('#btnCambiar').on('click', function () {
    $('.layout__modal .overlay').fadeIn()
  })

  $('.page2__close , .layout__modal .page2 .section1__main .content .data .link').on('click', function () {
    $('.layout__modal .overlay').fadeOut()
  })


/*
  var cat = Array.from(document.querySelectorAll('.layout__main .page2__main .section1__header .list__item figcaption p'))
  cat.map( el => {

  if (el.textContent === 'Servicios') {
      el.style.color = '#53cdf2'
    } else if (el.textContent === 'Comida Rápida') {
      el.style.color = '#f5a623'

    } else if (el.textContent === 'Restaurante') {
      el.style.color = '#7ed321'

    } else if (el.textContent === 'Viajes') {
      el.style.color = '#e5336a'

    } else if (el.textContent === 'Belleza y Salud') {
      el.style.color = '#0fd299'

    } else if (el.textContent === 'Ropa y Accesorios') {
      el.style.color = '#c28aff'

    } else if (el.textContent === 'Detalles y Obsequios') {
      el.style.color = '#ff79ae'

    } else if (el.textContent === 'Diversión') {
      el.style.color = '#1d87fa'

    }
    
  })
  */

  var catchDom = function() {
    //dom.questions = Array.apply(null, document.querySelectorAll(st.questions));
    //dom.considerations = document.querySelector(st.considerations);
    /*dom.selected = document.querySelector(st.selected);
    dom.title = dom.selected.querySelector('h3');
    dom.dropdown = document.querySelector(st.dropdown);
    dom.menu = Array.apply(null, document.querySelectorAll(st.menu));
    dom.tab = Array.apply(null, document.querySelectorAll(st.tab));*/
    //dom.btnCambiar = document.querySelector(st.btnCambiar);
    dom.menu = document.querySelector(st.menu);
    dom.close = document.querySelector(st.close);
    dom.header = document.querySelector(st.header);
  };

  var suscribeEvents = function() {

    win.addEventListener('scroll', events.eScroll);

    dom.close.addEventListener("click", events.eOpenMenu);

    //if(page == "page2"){
      
      //win.addEventListener('resize', events.eResize);

    //}

    /*dom.questions.filter(function (element, index) {
      element.addEventListener("click", events.eOpenQuestions);
    })

    dom.considerations.addEventListener("click", events.eOpenConsiderations);*/

    //dom.dropdown.addEventListener("click", events.eOpenDropdown);

    /*dom.menu.filter(function (element, index) {
      element.addEventListener("click", events.eTabs.bind(this, index));
    });

    mediaquery.addListener(events.eMediaQuery);

    if (mediaquery.matches) {
      first = true;
      dom.selected.addEventListener("click", events.eOpenDropdown);
      dom.dropdown.classList.add('movil');
    }*/

    //dom.btnCambiar.addEventListener("click", events.eOpenChangeOptions);
    /*dom.btnCambiar.addEventListener("click", function(){
      alert("ya");
    });*/

    //alert(dom.btnCambiar);

  };

  var plugins = {
    slick: function(){
      dom.slick1 = $(st.list1).slick({
        arrows: true,
        dots: true,
        slidesToShow: 3,
        infinite: false,

        responsive: [ 
          {

            breakpoint: 1025,
            settings: {
              slidesToShow: 2,
              //arrows: true,
              //dots: false
            }

          },
          {

            breakpoint: 570,
            settings: {
              variableWidth: true,
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              infinite : true,
              dots: false,
              centerMode: true,
              centerPadding: '0px',
             }

          }
        ]
      });
      dom.slick2 = $(st.list2).slick({
        arrows: true,
        dots: true,
        slidesToShow: 4,
        infinite: false,
        responsive: [

          {

            breakpoint: 1025,
            settings: {
              slidesToShow: 3,
              //arrows: true,
              //dots: false
              
            }

          },

          {

            breakpoint: 769,
            settings: {
              slidesToShow: 2,
              //arrows: true,
              //dots: false
              
            }

          },

         
          {

            breakpoint: 570,
            settings: {
              variableWidth: true,
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              infinite : true,
              dots: false,
              centerMode: true,
              centerPadding: '0px',
            }

          }
          

        ]
      });
      dom.slick3 = $(st.list3).slick({
        responsive: [
          {
              breakpoint: 9999,
              settings: "unslick"
          },
          {

            breakpoint: 1025,
            settings: {
              variableWidth: true,
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              infinite : false,
              dots: false,
            }

          }
        ]
      });

      dom.slick4 = $(st.list4).slick({
        arrows: true,
        dots: true,
        slidesToShow: 3,
        infinite: false,
        responsive: [

          {

            breakpoint: 1025,
            settings: {
              slidesToShow: 2,
              //arrows: true,
              //dots: false
              
            }

          },

          {

            breakpoint: 769,
            settings: {
              slidesToShow: 2,
              //arrows: true,
              //dots: false
              
            }

          },

         
          {

            breakpoint: 570,
            settings: {
              variableWidth: true,
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              infinite : true,
              dots: false,
              centerMode: true,
              centerPadding: '0px',
            }

          }
          

        ]
      });

      dom.slick5 = $(st.list5).slick({
        arrows: true,
        dots: true,
        slidesToShow: 3,
        infinite: false,
        rows: columnasDesktop,
        responsive: [

          {

            breakpoint: 1025,
            settings: {
              slidesToShow: 2,
              //arrows: true,
              //dots: false
              
            }

          },

         
          {

            breakpoint: 570,
            settings: {
              variableWidth: true,
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              infinite : true,
              dots: false,
              centerMode: true,
              centerPadding: '0px',
            }

          }
          

        ]
      });

     
    }
  }

  var methods = {
    /*mGetHashParameter: function(){

      var hash = win.location.hash.split("&");
      var choose = '';

      if(hash == "#queesclarovideo"){
        choose = 0;
      }else if(hash == "#fox"){
        choose = 1;
      }else if(hash == "#noggin"){
        choose = 2;
      }else if(hash == "#crackle"){
        choose = 3;
      }else if(hash == "#picardianacional"){
        choose = 4;
      }

      if(hash == ""){
        methods.mTabsSelected(0);
      }else{
        methods.mTabsSelected(choose);
      }

    },
    mTabsSelected: function(index){
      dom.menu.forEach(function(item, i) {

        dom.menu[i].classList.remove('active');
        dom.tab[i].classList.remove('active');
        
      });

      dom.menu[index].classList.add('active');
      dom.tab[index].classList.add('active');

      win.location.hash = st.hash[index];

      if(index == 0){
        dom.slick1.slick('setPosition');
      }else if(index == 1){
        dom.slick2.slick('setPosition');
      }else if(index == 2){
        dom.slick3.slick('setPosition');
      }else if(index == 3){
        dom.slick4.slick('setPosition');
      }else if(index == 4){
        dom.slick5.slick('setPosition');
      }

      if (mediaquery.matches) {
        events.eOpenDropdown();
        dom.title.innerHTML = dom.menu[index].innerHTML;
      }

      //if(page == "page1"){
        //dom.slick1.slick('setPosition');
        //dom.slick2.slick('setPosition');
      //}else if(page == "page2"){
      //  dom.box[index].classList.add('active');
      //}
    },
    mGetUrlParameter: function(name) {
      name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
      var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
      var results = regex.exec(location.search);
      return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }*/

  }

  var events = {
    eOpenMenu: function(e){
      var buttonClass = this.classList;
      var menuClass = dom.menu.classList;

      if(buttonClass.contains("active")){
        buttonClass.remove("active");
        menuClass.remove("active");
      }else{
        buttonClass.add("active");
        menuClass.add("active");
      }
    },
    eResize: function(e){
      dom.slick1.slick('resize');
      dom.slick2.slick('resize');
      dom.slick3.slick('resize');
    },
    eScroll: function(){
      if (win.scrollY >= 50) {
        dom.header.classList.add('hide');
      } else {
        dom.header.classList.remove('hide');
      }   
    }
    /*eTabs: function(index, e){
      methods.mTabsSelected(index);
    },
    eMediaQuery: function(mediaquery){
      if (mediaquery.matches) {
        dom.selected.addEventListener("click", events.eOpenDropdown);
        dom.dropdown.classList.add('movil');
        first = false;
      } else {
        dom.selected.removeEventListener('click', events.eOpenDropdown);
        dom.dropdown.classList.remove('movil');
        dom.dropdown.classList.remove('show');
        dom.selected.classList.remove('show');
        first = true;
      }
    },
    eOpenDropdown: function(){
      var dropdown = dom.dropdown.classList;

      if(first == true){
        first = false;
      }else{
        if(dropdown.contains("show")){
          dom.dropdown.classList.remove('show');
          dom.selected.classList.remove('show');
        }else{
          dom.dropdown.classList.add('show');
          dom.selected.classList.add('show');
        }
      }
      
    }*/
    /*eOpenQuestions: function(e){

      var buttonClass = this.parentNode.classList;

      if(buttonClass.contains("active")){
        buttonClass.remove("active");
      }else{
        buttonClass.add("active");
      }

      var panel = this.nextElementSibling;

      if (panel.style.maxHeight){
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      } 

    },
    eOpenConsiderations: function(){
      var buttonClass = event.target.parentNode.parentNode.children[0].classList;

      if(buttonClass.contains("active")){
        buttonClass.remove("active");
      }else{
        buttonClass.add("active");
      }

      var panel = this.nextElementSibling;

      if (panel.style.maxHeight){
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      } 
    }*/
  };

  return {
    init: function(x){
      page = x;

      catchDom();
      suscribeEvents();

      plugins.slick();
      //methods.mGetHashParameter();
    }
  }

})(APP, window, jQuery);

$(".usetype").on('click',function(e){
    e.preventDefault();
     let nombre = $(this).html();

     $(".departmento").html(nombre);

     $(".page2__close").trigger('click');
});
