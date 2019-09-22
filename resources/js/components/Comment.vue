<template>
    <div class="card-body">
        <div class="input-group">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-danger" @click.prevent="submitComment()">Send</button>
            </span>

            <input type="text" v-model="content" class="form-control" placeholder="Enter Something" @keyup.enter="submitComment()">
        </div>
        <br>
        <div v-if="comments && comments.length">
            <div v-for="(comment, index) in comments" class="card">
                <div class="card-images">
                    <img :src="'/profile.png'" :width="'100px'">
                </div>
                <div class="card-body">
                    <h5>{{ comment.user.name }}</h5>
                    <p>{{ comment.content }}</p>
                    <p>{{ index }}</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{

  props:['post'],

  data(){
    return{
        content:'',
        comments: [],
    }
  },
  mounted() {
    axios.get('/comment/' + this.post.id)
    .then(response => {
      this.comments = response.data

    })
    .catch(e => {
        alert('error')
        this.errors.push(e)
    })
    Echo.private('posts')
    .listen('SendComment', (e)=>{
        this.comments.unshift(e);
    })
  },
  methods:{
   submitComment(){
    axios.post('/comment/' + this.post.id, {
      content: this.content
    })
    .then(response => {
        alert('berhasil');
        this.content='';
        this.comments.unshift(response.data);
    })
   }
  }
}
</script>
