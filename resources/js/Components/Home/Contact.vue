<template>
    <div class="card_contact">
        <form @submit.prevent="submitForm">
            @csrf
            <div class="form-group">
                <label for="name">
                    <span>Full Name*</span>
                    <input type="text" id="name" v-model="formData.name">
                </label>
                <label for="email">
                    <span>Email*</span>
                    <input type="text" id="email" v-model="formData.email">
                </label>
            </div>
            <div class="form-group">
                <label for="subject">
                    <span>Subject*</span>
                    <input type="text" id="subject" v-model="formData.subject">
                </label>
            </div>
            <div class="form-group">
                <label for="message">
                    <span>Your message*</span>
                    <textarea name="" id="message" cols="30" rows="8" v-model="formData.message"></textarea>
                </label>
            </div>
            <div class="container_button">
                <button type="submit">Send</button>
            </div>
        </form>
    </div>
</template>
<script>
import { ref } from 'vue';
import axios from 'axios';

export default {
  setup() {
    const formData = ref({
      name: '',
      email: '',
      subject: '',
      message: '',
    });

    const submitForm = () => {
      axios.post('/contact', formData.value)
        .then(response => {
          console.log('Respuesta del servidor:', response.data);
          // Puedes hacer algo con la respuesta del servidor si es necesario
        })
        .catch(error => {
          console.error('Error al enviar el formulario:', error);
          // Manejar errores aquí si es necesario
        });
    };

    return {
      formData,
      submitForm
    };
  }
};
</script>
<style scoped>
.card_contact{
    padding: 0 20px 20px;
}
.form-group > label{
    display: flex;
    flex-direction: column;
    padding: 10px;
    flex: 1;
}
label > span{
    margin-bottom: 5px;
}
label > input{
    height: 25px;
    padding: 5px 10px 1px;
    outline: none;
    border: none;
    border-bottom: 2px solid #F1F7ED;
    background: transparent;
    font-family: Cabin;
    color: #F1F7ED;
    font-size: 18px;
}
label > textarea{
    background: 
        linear-gradient(to right, transparent 10px, transparent 10px),
        linear-gradient(to left, transparent 10px, transparent 10px),
        repeating-linear-gradient(transparent 0px, transparent 34px, #F1F7ED 25px, #F1F7ED 36px);
    border: none;
    resize: none;
    line-height: 35px;
    font-family: Cabin;
    padding: 8px 10px;
    font-size: 18px;
    color: #F1F7ED;
    outline: none;
    overflow: hidden;
    height: auto;
}
.form-group:nth-child(1){
    display: flex;
}

.container_button{
    text-align: center;
    margin-top: 15px;
}
.container_button > button{
    padding: 15px 40px;
    background: transparent;
    border: 2px solid #F1F7ED;
    border-radius: 4px;
    color: #F1F7ED;
    font-size: 18px;
    transition: 0.5s ease;
    cursor: pointer;
}
@media (max-width: 700px){
    .form-group{
        flex-direction: column;
    }
}
</style>