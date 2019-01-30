<template>
  <div id="app" class="container">
    <img src="./assets/logo.png">
    <div>
      <p>
        If iView is successfully added to this project, you'll see an
        <code v-text="'<Button>'"></code>
        below
      </p>
      <Button type="primary" shape="circle" :loading='loading_control' icon="ios-home">Button</Button>
      <Button type="primary" long :disabled='button_control'>Long Button</Button>
      <ButtonGroup :vertical='true'>
          <Button type='primary'>Button</Button>
          <Button type='warning'>Button</Button>
          <Button type='success'>Button</Button>
      </ButtonGroup>
      <i-Switch @on-change='change'>
        <span slot='open'>on</span>
        <span slot='close'>off</span>
      </i-Switch>
      <Slider v-model='slider_value' :min='50' :max='200' :step='10' show-stops></Slider>
      <p>{{slider_value}}</p>
      <Slider v-model='slider_range' range></Slider>
     <Icon type="ios-checkmark" size="36" color="teal" />
    </div>
    <Button type="primary" @click="info">Display info prompt
    </Button >
    <Table :columns='column' :data='table_data' stripe ></Table>
    <Carousel style='width:600px' autoplay :autoplay-speed='2000' dots='outside'>
      <CarouselItem v-for='item in images' :key='item.id'>
          <img :src='item' />
        </CarouselItem>>
    </Carousel>
    <Progress :percent='25'></Progress>



    <HelloWorld msg="Welcome to Your Vue.js App"/>
  </div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'

export default {
  name: 'app',
  data(){
    return {
      images: [
        'http://axios-project.ddev.local/api/storage/pexels-photo-1826095.jpeg',
        'http://axios-project.ddev.local/api/storage/pexels-photo-1831238.jpeg',

      ],
      column: [
        {title:'Brand', key:'brand'},
        {title:'Model', key:'model'},
        {title:'Engine', key:'engine'},
        {title:'Gearbox', key:'gearbox'}
      ],
      table_data: [
        {brand: 'Toyota', model: 'Supra', engine:'Petrol', gearbox:'manual'},
        {brand: 'VW', model: 'Golf', engine:'Petrol', gearbox:'manual'},
        {brand: 'VW', model: 'Polo', engine:'Petrol', gearbox:'manual'}
      ],
      button_control: true,
      loading_control: false,
      slider_value:50,
      slider_range: [10,30]
    }
  },
  methods: {
    change(status){
      this.$Message.success({
        content: 'this is the message',
        duration: 10,
        closable: true,
        onClose(){
          alert('you really want to close this message?')
        }
      });
    },
    info() {
      this.$Message.info('This is info from iview Message');
    }
  },
  components: {
    HelloWorld
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
