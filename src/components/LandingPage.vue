<template>
  <div class="bg-gray-100 text-gray-800">
    <section ref="section1" class="relative overflow-hidden bg-blue-600 opacity-0">
      <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h1 class="text-4xl font-extrabold text-white sm:text-5xl lg:text-6xl">
            Transforme Seu Negócio com Nossa Solução de Força de Vendas
          </h1>
          <p class="mt-4 text-xl text-blue-200">
            Soluções inteligentes para otimizar suas vendas e gestão de clientes.
          </p>
        </div>
      </div>
    </section>

    <section ref="section2" class="py-16 opacity-0">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h2 class="text-3xl font-bold text-gray-900">Funcionalidades</h2>
          <p class="mt-2 text-lg text-gray-600">
            Descubra como nosso sistema pode transformar sua força de vendas.
          </p>
        </div>

        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
          <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center justify-center mb-4">
              <i class="fas fa-calculator text-4xl text-blue-600"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800">Cálculo de Imposto</h3>
            <p class="mt-2 text-gray-600">
              O sistema mostra os impostos como ICMS ST, IPI e outros, facilitando o cálculo.
            </p>
          </div>

          <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center justify-center mb-4">
              <i class="fas fa-plug text-4xl text-blue-600"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800">Integração</h3>
            <p class="mt-2 text-gray-600">
              Integrado ao seu ERP para enviar informações confiáveis e aumentar as vendas.
            </p>
          </div>

          <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center justify-center mb-4">
              <i class="fas fa-chart-line text-4xl text-blue-600"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800">Expectativa de Vendas</h3>
            <p class="mt-2 text-gray-600">
              Acompanhe as vendas em diversos níveis, como produto, cliente e cidade.
            </p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center justify-center mb-4">
              <i class="fas fa-wallet text-4xl text-blue-600"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800">Saldo Flex</h3>
            <p class="mt-2 text-gray-600">
              Conta-corrente para negociar preços com o cliente de forma flexível.
            </p>
          </div>

          <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center justify-center mb-4">
              <i class="fas fa-map-marked-alt text-4xl text-blue-600"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800">Rotas</h3>
            <p class="mt-2 text-gray-600">
              Defina rotas para otimizar o tempo do vendedor.
            </p>
          </div>

          <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center justify-center mb-4">
              <i class="fa-solid fa-wifi"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800">Funcionamento Offline</h3>
            <p class="mt-2 text-gray-600">
              A conexão é necessária apenas para receber dados e sincronizar pedidos.
            </p>
          </div>

          <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center justify-center mb-4">
              <i class="fas fa-tags text-4xl text-blue-600"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800">Políticas de Preço</h3>
            <p class="mt-2 text-gray-600">
              Controle descontos facilmente com o módulo de políticas de desconto.
            </p>
          </div>

          <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center justify-center mb-4">
              <i class="fas fa-th text-4xl text-blue-600"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800">Grade de Produtos</h3>
            <p class="mt-2 text-gray-600">
              Tenha variações do seu produto com a grade de produtos.
            </p>
          </div>

          <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center justify-center mb-4">
              <i class="fas fa-mobile-alt text-4xl text-blue-600"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800">Multiplataforma</h3>
            <p class="mt-2 text-gray-600">
              Utilize o sistema no Android, iOS ou pela Web.
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="relative overflow-hidden bg-gray-700 py-16 opacity-0" ref="section4">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h2 class="text-3xl font-bold text-white">Nossos clientes vendem mais de R$ 800 milhões por mês através do
            Demander</h2>
        </div>
        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-12 text-center text-white">
          <div>
            <h3 class="text-4xl font-bold text-orange-500">+950</h3>
            <p class="mt-2">Clientes</p>
          </div>
          <div>
            <h3 class="text-4xl font-bold text-orange-500">+430 mil</h3>
            <p class="mt-2">Pedidos por mês</p>
          </div>
          <div>
            <h3 class="text-4xl font-bold text-orange-500">+R$ 40 milhões</h3>
            <p class="mt-2">Em vendas por dia</p>
          </div>
        </div>
      </div>
    </section>
    <section ref="section3" class="py-16 bg-white opacity-0">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row items-center">
        <div class="lg:w-1/2">
          <img src="../assets/landpage/Demander-Forca-de-Vendas-1-2.webp" alt="Demander Força de Vendas"
            class="rounded-lg shadow-lg">
        </div>
        <div class="lg:w-1/2 lg:pl-12 mt-8 lg:mt-0">
          <h2 class="text-3xl font-bold text-gray-900">Vendas centralizadas, rápidas e sem retrabalho</h2>
          <ul class="mt-4 space-y-4 text-lg text-gray-700 text-left w-full">
            <li>✅ <strong>Todas as vendas em um só lugar:</strong> pare de receber pedidos por whatsapp, e-mail ou
              anotações em papel e planilhas.</li>
            <li>✅ <strong>Integrado ao seu ERP:</strong> envie as informações que você já confia e use o Demander para
              aumentar as vendas.</li>
            <li>✅ <strong>Sem surpresas ao receber o pedido: </strong> garanta que o vendedor aplique descontos e
              políticas comerciais de forma correta.</li>
            <li>✅<strong> Mais tempo para o seu time:</strong> elimine a necessidade de um profissional exclusivo para
              digitação de pedidos ao final do dia.</li>
          </ul>
          <div class="mt-8 flex space-x-4">
            <a href="https://play.google.com/store/apps/details?id=br.com.retta.demander&pcampaignid=web_share"
              class="bg-blue-600 text-white px-4 py-2 rounded-full font-semibold flex items-center space-x-2 hover:bg-blue-700 transition duration-300"
              target="_blank">
              <i class="fa-brands fa-google-play"></i>
              <span>Disponível na Google Play</span>
            </a>
            <a href="https://apps.apple.com/br/app/demander-for%C3%A7a-de-vendas/id1468881432"
              class="bg-blue-600 text-white px-4 py-2 rounded-full font-semibold flex items-center space-x-2 hover:bg-blue-700 transition duration-300"
              target="_blank">
              <i class="fa-solid fa-apple-whole"></i>
              <span>Disponível na App Store</span>
            </a>
          </div>
        </div>
      </div>
    </section>
    <section ref="section5" class="py-16 bg-white opacity-0">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row items-center">
        <div class="lg:w-1/2 lg:pr-12 mt-8 lg:mt-0">
          <h2 class="text-3xl font-bold text-gray-900">Venda online com as plataformas E-commerce</h2>
          <ul class="mt-4 space-y-4 text-lg text-gray-700 text-left w-full">
            <li>✅ <strong>E-commerce B2B:</strong> ofereça para seu cliente, uma plataforma B2B, onde ele pode comprar a
              qualquer hora de forma autônoma e respeitando as políticas comerciais definidas por você.</li>
            <li>✅ <strong>App B2B exclusivo:</strong> tenha um app exclusivo para sua loja.</li>
            <li>✅ <strong>Integração com plataformas B2C:</strong> integramos com Tray, Loja integrada, Mercado livre.
              Envie seus produtos, receba pedidos, aumente suas vendas.</li>
            <li>✅<strong>Reduza custos:</strong> economize oferecendo uma plataforma onde o próprio cliente faz os
              pedidos e disponível a qualquer momento.</li>
            <li>✅<strong>Traga novas oportunidades:</strong> com a plataforma de vendas online seu negócio tem mais
              visibilidade e credibilidade.</li>
          </ul>
          <div class="mt-8 flex space-x-4">
            <a href="https://play.google.com/store/apps/details?id=br.com.retta.demander&pcampaignid=web_share"
              class="bg-blue-600 text-white px-4 py-2 rounded-full font-semibold flex items-center space-x-2 hover:bg-blue-700 transition duration-300"
              target="_blank">
              <i class="fa-brands fa-google-play"></i>
              <span>Disponível na Google Play</span>
            </a>
            <a href="https://apps.apple.com/br/app/demander-for%C3%A7a-de-vendas/id1468881432"
              class="bg-blue-600 text-white px-4 py-2 rounded-full font-semibold flex items-center space-x-2 hover:bg-blue-700 transition duration-300"
              target="_blank">
              <i class="fa-solid fa-apple-whole"></i>
              <span>Disponível na App Store</span>
            </a>
          </div>
        </div>
        <div class="lg:w-1/2">
          <img src="../assets/landpage/Demander-Forca-de-Vendas-1-5.webp" alt="Demander Força de Vendas"
            class="rounded-lg shadow-lg">
        </div>
      </div>
    </section>
    <section ref="section6" class="py-16 bg-white opacity-0">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row items-center">
        <div class="lg:w-1/2">
          <img src="../assets/landpage/App-separacao-site.png" alt="Demander Força de Vendas"
            class="rounded-lg shadow-lg">
        </div>
        <div class="lg:w-1/2 lg:pl-12 mt-8 lg:mt-0">
          <h2 class="text-3xl font-bold text-gray-900">App de Separação de Pedidos</h2>
          <ul class="mt-4 space-y-4 text-lg text-gray-700 text-left w-full">
            <li>✅ <strong>Mais agilidade:</strong> no seu processo de separação de produtos do pedido.</li>
            <li>✅ <strong>Mais precisão:</strong> na hora da separação.</li>
            <li>✅ <strong>Gestão de estoque:</strong> otimizada e em tempo real.</li>
            <li>✅<strong>Automatize o processo:</strong> e reduza custos operacionais.</li>
            <li>✅<strong>Traga novas oportunidades:</strong> do seu time de separação.</li>
            <li>✅<strong>Solução integrada:</strong> ao Demander Força de Vendas.</li>
          </ul>
          <div class="mt-8 flex space-x-4">
            <a href="https://play.google.com/store/apps/details?id=br.com.retta.demander&pcampaignid=web_share"
              class="bg-blue-600 text-white px-4 py-2 rounded-full font-semibold flex items-center space-x-2 hover:bg-blue-700 transition duration-300"
              target="_blank">
              <i class="fa-brands fa-google-play"></i>
              <span>Disponível na Google Play</span>
            </a>
            <a href="https://apps.apple.com/br/app/demander-for%C3%A7a-de-vendas/id1468881432"
              class="bg-blue-600 text-white px-4 py-2 rounded-full font-semibold flex items-center space-x-2 hover:bg-blue-700 transition duration-300"
              target="_blank">
              <i class="fa-solid fa-apple-whole"></i>
              <span>Disponível na App Store</span>
            </a>
          </div>
        </div>
      </div>
    </section> 
    <section ref="section7" class="py-16 bg-white opacity-0">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row items-center">
        <div class="lg:w-1/2 lg:pr-12 mt-8 lg:mt-0">
          <h2 class="text-3xl font-bold text-gray-900">O Demander se integra com o ERP que você já utiliza</h2>
          <ul class="mt-4 space-y-4 text-lg text-gray-700 text-left w-full">
           <p>
            O Demander pode facilmente ser integrado com o seu sistema ERP. Com a integração os pedidos são enviados automaticamente, sem necessidade de redigitação.
           </p>
         
           <p>
            Com a plataforma Omnichannel do Demander você otimiza a experiência do seu cliente e de sua equipe, fazendo com que o atendimento seja contínuo, já que todos os dados ficam centralizados.
           </p>
          
           <p class="text-2xl font-bold text-orange-500">+ 70 ERPs Integrados</p>
          </ul>
          <div class="mt-8 flex space-x-4">
            <a href="https://play.google.com/store/apps/details?id=br.com.retta.demander&pcampaignid=web_share"
              class="bg-blue-600 text-white px-4 py-2 rounded-full font-semibold flex items-center space-x-2 hover:bg-blue-700 transition duration-300"
              target="_blank">
              <i class="fa-brands fa-google-play"></i>
              <span>Disponível na Google Play</span>
            </a>
            <a href="https://apps.apple.com/br/app/demander-for%C3%A7a-de-vendas/id1468881432"
              class="bg-blue-600 text-white px-4 py-2 rounded-full font-semibold flex items-center space-x-2 hover:bg-blue-700 transition duration-300"
              target="_blank">
              <i class="fa-solid fa-apple-whole"></i>
              <span>Disponível na App Store</span>
            </a>
          </div>
        </div>
        <div class="lg:w-1/2">
          <img src="../assets/landpage/Demander-Forca-de-Vendas-1-6.webp" alt="Demander Força de Vendas"
            class="rounded-lg shadow-lg">
        </div>
      </div>
    </section>
  </div>
</template>

<style scoped>
* {
  box-sizing: border-box;
}

body,
html {
  font-family: "Roboto", sans-serif;
  background-color: black;
  color: white;
}

h1 {
  margin: 50px 0;
  text-align: center;
}

@keyframes fadeInUp {
  0% {
    transform: translateY(100%);
    opacity: 0;
  }
  100% {
    transform: translateY(0%);
    opacity: 1;
  }
}

.fadeInUp-animation {
  animation: 1.5s fadeInUp;
}
</style>

<script>
export default {
  mounted() {
    const sections = [this.$refs.section1, this.$refs.section2, this.$refs.section3, this.$refs.section4, this.$refs.section5, this.$refs.section6, this.$refs.section7];

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('fadeInUp-animation');
          entry.target.classList.remove('opacity-0');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1,
    });

    sections.forEach((section) => {
      observer.observe(section);
    });
  },
};
</script>
