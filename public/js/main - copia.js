var vm = new Vue({
  data:{
    video:{
      url: null
    },
    modal:{
      show: false
    }
  },
  mounted: function(){
    const self = this;

    var slick1 = $('#list1').slick({
      dots: false,
      slidesToShow: 1,
      /*customPaging : function(slider, i) {
        var thumb = $(slider.$slides[i]).data();
        return '<a>'+(i + 1)+'</a>';
      },*/
      responsive: [
        /*{

          breakpoint: 1400,
          settings: {
            slidesToShow: 4,
            infinite: true
          }

        }, {

          breakpoint: 1025,
          settings: {
            slidesToShow: 3,
            infinite: true
          }

        }, {

          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            arrows: true,
            //centerMode: true,
            //centerPadding: '40px',
            dots: false
          }

        },*/
        {
            breakpoint: 9999,
            settings: "unslick"
        }, 
        {

          breakpoint: 376,
          settings: {
            slidesToShow: 1,
            arrows: true,
            //centerMode: true,
            //centerPadding: '40px',
            dots: false
          }

        }
      ]
    });

    var slick2 = $('#list2').slick({
      dots: false,
      slidesToShow: 1,
      /*customPaging : function(slider, i) {
        var thumb = $(slider.$slides[i]).data();
        return '<a>'+(i + 1)+'</a>';
      },*/
      responsive: [
        /*{

          breakpoint: 1400,
          settings: {
            slidesToShow: 4,
            infinite: true
          }

        }, {

          breakpoint: 1025,
          settings: {
            slidesToShow: 3,
            infinite: true
          }

        }, {

          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            arrows: true,
            //centerMode: true,
            //centerPadding: '40px',
            dots: false
          }

        },*/
        {
            breakpoint: 9999,
            settings: "unslick"
        }, 
        {

          breakpoint: 376,
          settings: {
            slidesToShow: 1,
            arrows: true,
            //centerMode: true,
            //centerPadding: '40px',
            dots: false
          }

        }
      ]
    });

    var carousel = $('.section4__carousel').slick({
      dots: false,
      slidesToShow: 4,
      customPaging : function(slider, i) {
      var thumb = $(slider.$slides[i]).data();
      return '<a>'+(i + 1)+'</a>';
      },
      responsive: [{

        breakpoint: 1400,
        settings: {
          slidesToShow: 4,
          infinite: true
        }

      }, {

        breakpoint: 1025,
        settings: {
          slidesToShow: 3,
          infinite: true
        }

      }, {

        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          arrows: true,
          //centerMode: true,
          //centerPadding: '40px',
          dots: false
        }

      }, {

        breakpoint: 376,
        settings: {
          slidesToShow: 1,
          arrows: true,
          //centerMode: true,
          //centerPadding: '40px',
          dots: false
        }

      }, {

        breakpoint: 300,
        settings: {
          slidesToShow: 1,
          arrows: true,
          centerMode: true,
          centerPadding: '40px',
          dots: false
        }
        //settings: "unslick" // destroys slick

      }]
    });


    var btnDetail = Array.apply(null, document.querySelectorAll('.info__list .btnDetail'));

    btnDetail.filter(function (element, index) {
      element.addEventListener("click", function(event){ 
        this.parentNode.parentNode.parentNode.parentNode.parentNode.classList.add("active");
      });
    });

    var btnClose = Array.apply(null, document.querySelectorAll('.info__list .item__side--button'));

    btnClose.filter(function (element, index) {
      element.addEventListener("click", function(event){ 
        this.parentNode.parentNode.parentNode.classList.remove("active");
      });
    });
    

    var menu = Array.apply(null, document.querySelectorAll('.section1__content .section1__tab .menu ul li'));
    var tab = Array.apply(null, document.querySelectorAll('.section1__content .section1__tab .info .info__tab'));

    menu.filter(function (element, index) {

      element.addEventListener("click", function(event){ 

        menu.forEach(function(el, i) {
          menu[i].classList.remove('active');
          tab[i].classList.remove('active');
        });

        menu[index].classList.add('active');
        tab[index].classList.add('active');

        slick1.slick('setPosition');
        slick2.slick('setPosition');
        
      });

    });

    tab[1].classList.remove("active");

    window.addEventListener('resize', function(){
      slick1.slick('resize');
      slick2.slick('resize');
    });



    var tab1Price = document.querySelector('#tab1Price');
        
    tab1Price.addEventListener('change',function(e){
      var value = e.target.value;
      if(value != "") self.onChangePrice('#list1',value);
    });

    var tab1Plan = document.querySelector('#tab1Plan');
        
    tab1Plan.addEventListener('change',function(e){
      var value = e.target.value;
      if(value != "") self.onChangePlan('#list1',value);
    });


    var tab2Price = document.querySelector('#tab2Price');
        
    tab2Price.addEventListener('change',function(e){
      var value = e.target.value;
      if(value != "") self.onChangePrice('#list2',value);
    });

    var tab2Plan = document.querySelector('#tab2Plan');
        
    tab2Plan.addEventListener('change',function(e){
      var value = e.target.value;
      if(value != "") self.onChangePlan('#list2',value);
    });


    /*var questions = Array.apply(null, document.querySelectorAll('.questions__list ul li h3'));

    questions.filter(function (element, index) {

      //element.firstChild.addEventListener("click", function(event){ 
      //  if (event.stopPropagation) {
      //    event.stopPropagation();
      //  } else {
      //    event.cancelBubble = true;
      //  }
      //});

      element.addEventListener("click", function(event){ 

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

      });

    });*/


    /*var considerations = document.querySelector('.considerations__subtitle');

    considerations.addEventListener("click", function(){ 

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

    });*/
  
  },
  methods: {
    onChangePrice: function(selector, value){

      var list = document.querySelector(selector);
      var items = Array.apply(null, list.querySelectorAll('.item'));

      items.sort(function(a, b) {

        var aItem = +a.getAttribute('data-price');
        var bItem = +b.getAttribute('data-price');

        if(value == 'mayor'){
          return bItem - aItem; 
        }else if(value == 'menor'){
          return aItem - bItem; 
        }

      });

      items.forEach(function(el, i) {
        list.appendChild(items[i]);
      });

    },
    onChangePlan: function(selector, value){

      var calc = value.split("-"),
          min = parseFloat(calc[0]),
          max = parseFloat(calc[1]);

      var list = document.querySelector(selector);
      var items = Array.apply(null, list.querySelectorAll('.item'));

      items.filter(function(item){

        var num = item.getAttribute('data-megas');

        if(min > num || max < num){
          item.style.display = "none";
        }else{
          item.style.display = "block";
        }

      });

    },
    openVideo: function(url){
      this.video.url = url;

      //this.video.url = '<iframe id="video" width="560" height="315" :src="'+ url +'" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>';
      //this.video.url = '<iframe width="560" height="315" src="https://www.youtube.com/embed/mvV5AloFRsY?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
      this.showModal();
    },
    showModal: function(){
      this.modal.show = true;
      document.querySelector("body").style.overflow = 'hidden';
    },
    closeModal: function(){
      this.modal.show = false;
      document.querySelector("body").style.overflow = 'auto';
    }
  }
}).$mount('#app');

function openVideo(url){
  vm.openVideo(url);
}