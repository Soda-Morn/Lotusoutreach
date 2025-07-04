<template>
  <div>
    <WhyGirl />
    <div class="container mx-auto py-8 px-4">
      <h2 class="text-2xl font-bold text-center mb-6">Our Focus Areas</h2>
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 ">
        <Card title="Education and Training"
          image="https://lotusoutreachaustralia.org.au/wp-content/uploads/2015/07/Row-of-girls-watching-grad-ceremony-300x163.png"
          content="Girls’ education is a transformative force. Educated women experience wide-ranging benefits. They have healthier children, are at less risk of experiencing domestic violence and marrying young, have fewer children, higher incomes, and more respect in making household decisions. These advantages combined can help tp lift households, communities, and nations out of poverty. Moreover, and at the cornerstone of our approach to social development, educated women are more likely to become active and influential members of their communities.
            The education of women is an international development priority. UNESCO estimates “130 million girls between the age of 6 and 17 are out of school and 15 million girls of primary-school age—half of them in sub-Saharan Africa— will never enter a classroom.”
            In the poverty-stricken areas of India and Cambodia where we work, women face significant barriers to education. Often they are up against having to travel long distances to school, restrictive gender narratives, violence, and trafficking and/or migration.
            We combine advocacy efforts with the provision of access to education, university level scholarships, and assistance to ensure young Indian and Cambodian women finish locally unprecedented levels of education and/or skill training. We provide seminars and mentoring that emphasize skills and development that prepare young women to be catalysts of profound shifts in their communities."
          buttonText="Learn more" cardClass="bg-pink-600 text-white" buttonClass="bg-pink-600 text-white" />
        <Card title="Creating Gender Equality"
          image="https://images.globalgiving.org/pfil/4655/pict_original.jpg?w=460&h=306&auto=compress,enhance&fit=crop&crop=faces,center&format=auto&dpr=2"
          content="	
            Where there is poverty, there are opportunities for exploitation. Women and girls are much more vulnerable than men and boys  in low income countries where gender discrimination impacts all levels of social, economic and political life. We recognize gender discrimination and work toward gender equality in the communities we are active. Notably, in 2014, our LEARN (now Blossom Bus) program received national recognition in India by the Chief Minister of the state for “contributing to the education of 1 million students in Haryana.”. In 2016, Harvard University South Asia Institute and Tata Trust recognized our program out of thousands of others in India for reducing gender discrimination.
            Gender theory recognizes a discrimination concept known as “womens’ triple burden”. Women work the fields, look after home and care for children, and shoulder the burden of maintaining family and social networks – relationships that are extremely important to societies living on the poverty line. Cultural norms among those living in poverty create barriers to education for girls, impose early marriages, and reinforce little to no wages for work done.
            The 2016, Down to Earth yearbook published extracts of a report from an Indian National Commission for Women that showed women in India work twice as many hours as farm animals and three times more than men. What is more, women in India only have legal right to 12.78% of the agricultural land they spend 60 hours a week farming for no pay. (Centre for Science and Environment, New Delhi, 2016 Down To Earth year book p. 67-68)
            The women we invest in invest in their families and communities. Our advocacy and mobilization programs amplify their much-needed voices within their communities and catalyze change at a grassroots level.
            As women and girls gain confidence, self-esteem, and initiative, they inspire the change in their sisters, friends and families. This creates a trickle-down effect; cultural norms shift and communities are transformed."
          buttonText="Learn more" cardClass="bg-pink-600 text-white" buttonClass="bg-pink-600 text-white" />
        <Card title="Care and Protection"
          image="https://images.globalgiving.org/pfil/10626/pict_original.jpg?w=460&h=306&auto=compress,enhance&fit=crop&crop=faces,center&format=auto&dpr=2"
          content="	
            Our care initiatives address gaps in the provision of basic needs in places where the conditions for exploitation are devastating. These initiatives work together with our education and training projects to cultivate empowerment and protection for those who need it most. Providing care and protection nourishes wellbeing among beneficiaries and supports educational and learning outcomes.
            According to the United Nations, while human trafficking victims can be people of both genders, over 70% of those victims are women and girls. Moreover, 54% of all trafficking victims in 2014 were said to be trafficked for the purpose of sexual exploitation. Armed with this knowledge, we cannot stand idly by. We must do something.
            Because trafficking is inextricably linked to poverty around the world, all of our programs are preventative in nature. In the areas of Cambodia where we work, young women without education migrate by the tens of thousands from the rural countryside to cities looking for work to help support their families. Without options, the conditions for exploitation are tenfold. In India, reducing the devastating impacts of malnutrition is a worldwide priority.
            Providing care in vulnerable communities transforms lives and our impact is multiplied through the capacity and vision of the young women and girls we support."
          buttonText="Learn more" cardClass="bg-pink-600 text-white" buttonClass="bg-pink-600 text-white" />
        <Card title="Care and Protection"
          image="https://images.globalgiving.org/pfil/22793/pict_original.jpg?w=460&h=306&auto=compress,enhance&fit=crop&crop=faces,center&format=auto&dpr=2"
          content="	
            Lotus Outreach anti-trafficking, health and water service programs are directly serving 17,000 women and children in 2019.
            Education, literacy and advocacy play an important role in protecting girls from exploitation. As the voices of women strengthen, they are spurred to demand equality and look out for one another. In this way, education and training addresses exploitation before it can occur. For those who are survivors of violence, we have projects that provide trauma therapy, social services, and economic empowerment.
            Our work in anti-trafficking, health and water very directly improve wellbeing and educational outcomes. Our well program provides clean water and health education to communities in dire need while supporting school attendance for children who might otherwise be walking long distances for potable water while their parents earn wages. Instead, health and education are supported by the nearby wells we provide. Our rural health program is directly empowering local health workers to educate their communities.We are proud to support the conditions for our beneficiaries to thrive."
          buttonText="Learn more" cardClass="bg-pink-600 text-white" buttonClass="bg-pink-600 text-white" />
      </div>
      <div class="mt-12 container mx-auto px-4 max-w-6xl">
        <h2 class="text-2xl font-bold mb-8 text-center">How do we empower women and children in crisis?</h2>

        <div class="flex flex-col lg:flex-row gap-8 items-stretch">
          <!-- Image on left - matching card height -->
          <div class="w-full lg:w-8/12 cursor-pointer" @click="handleImageClick">
            <img
              src="https://images.globalgiving.org/pfil/3885/pict_original.jpg?w=460&h=306&auto=compress,enhance&fit=crop&crop=faces,center&format=auto&dpr=2"
              alt="Empowering women and children"
              class="rounded-lg shadow-lg w-full h-full object-cover transition-transform hover:scale-105"
              style="min-height: 300px;">
          </div>

          <!-- Content on right -->
          <div class="w-full lg:w-7/12 ">
            <div class="flex flex-wrap justify-center gap-3 mb-6">
              <button @click="activeSection = 'multi-dimensional'" :class="{
                'bg-pink-600 text-white': activeSection === 'multi-dimensional',
                'bg-gray-200 text-gray-700 hover:bg-gray-300': activeSection !== 'multi-dimensional'
              }" class="px-4 py-2 rounded-lg shadow-md transition-colors text-sm sm:text-base">
                Multi-dimensional
              </button>
              <button @click="activeSection = 'local'" :class="{
                'bg-pink-600 text-white': activeSection === 'local',
                'bg-gray-200 text-gray-700 hover:bg-gray-300': activeSection !== 'local'
              }" class="px-4 py-2 rounded-lg shadow-md transition-colors text-sm sm:text-base">
                Local
              </button>
              <button @click="activeSection = 'engaged'" :class="{
                'bg-pink-600 text-white': activeSection === 'engaged',
                'bg-gray-200 text-gray-700 hover:bg-gray-300': activeSection !== 'engaged'
              }" class="px-4 py-2 rounded-lg shadow-md transition-colors text-sm sm:text-base">
                Engaged
              </button>
              <button @click="activeSection = 'innovative'" :class="{
                'bg-pink-600 text-white': activeSection === 'innovative',
                'bg-gray-200 text-gray-700 hover:bg-gray-300': activeSection !== 'innovative'
              }" class="px-4 py-2 rounded-lg shadow-md transition-colors text-sm sm:text-base">
                Innovative
              </button>
            </div>

            <div class="bg-gray-50 p-5 rounded-lg h-[300px] overflow-y-auto">
              <div v-if="activeSection === 'multi-dimensional'" class="text-gray-700 space-y-4">
                <p>Successful programs embrace the complex nature of the development process, and introduce holistic
                  solutions where possible. Our scholarship programs do this, incorporating nutrition support, personal
                  and professional development, trafficking awareness, and gender-based advocacy.</p>
                <p>Families living in poverty often rely on their girl children to help make ends meet so providing
                  families with nutritional support helps ensure families remain committed to their girls' education.
                </p>
              </div>

              <div v-if="activeSection === 'local'" class="text-gray-700 space-y-4">
                <p>We are unique in that we have two local NGOs on the ground: one in India and the other in Cambodia.
                  Through 25 years of experience, we have prioritized cultural nuance as a core element of program
                  design.</p>
                <p>Our locally-based programs allow us to implement solutions that are highly responsive to local
                  conditions and the changing needs and priorities of our beneficiaries.</p>
              </div>

              <div v-if="activeSection === 'engaged'" class="text-gray-700 space-y-4">
                <p>When we say "change spreads fastest from the ground up" we mean that we believe sustainable change
                  occurs most effectively at the grassroots. The communities we work in are our partners in advocacy and
                  action.</p>
                <p>Our lasting networks have supported our core programs for more than 10 years and exemplify the
                  benefit of working together.</p>
              </div>

              <div v-if="activeSection === 'innovative'" class="text-gray-700 space-y-4">
                <p>Ground up and participatory based community change is at the cutting edge of sustainable development
                  approaches. We engage directly with local and multidimensional conditions to spur sustainable shifts.
                </p>
                <p>We start by working within existing infrastructures to deliver access to education and health
                  services, filling in gaps in the matrix of conditions to enable success and wellbeing.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-16 mb-12">
        <!-- Water Initiative Section -->
        <div class="flex flex-col md:flex-row gap-8 items-center bg-blue-50 rounded-xl p-6 md:p-8 shadow-lg">
          <!-- Text Content -->
          <div class="md:w-1/2 space-y-4 mb-28">
            <h3 class="text-3xl font-bold text-blue-700 mb-2">
              <span class="inline-block w-8 h-1 bg-blue-500 mb-2"></span>
              Clean Water for Communities
            </h3>
            <div class="space-y-4">
              <p class="text-gray-700 text-lg leading-relaxed">
                Clean water is transformative care for girls and their families. Did you know?
                <span class="font-semibold text-blue-600">60% of rural communities</span> lack access to clean drinking
                water.
              </p>
              <div class="bg-white p-4 rounded-lg border-l-4 border-blue-500 shadow-sm">
                <p class="text-gray-800">
                  <span class="text-2xl font-bold text-blue-600">10,000+</span><br>
                  villagers provided with clean water over the past decade
                </p>
              </div>
            </div>
          </div>

          <!-- Image -->
          <div class="md:w-1/2">
            <img src="https://lotusoutreach.org/wp-content/uploads/2018/12/people_at_public_water_pump.jpg"
              alt="Community members at water pump"
              class="w-full h-auto rounded-xl shadow-xl transform hover:scale-[1.02] transition duration-300">
          </div>
        </div>

        <!-- Impact Statement -->
        <div class="mt-7 rounded-2xl p-8 text-center text-pink-500 ">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-4" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
          </svg>
          <p class="text-xl md:text-2xl font-medium leading-relaxed max-w-4xl mx-auto">
            "Access to education for girls is the most powerful way to spark community engagement and economic growth."
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import WhyGirl from '../components/WhyGirl.vue'
import Card from '../components/Card.vue'

export default {
  name: 'WhyGirlView',
  components: {
    WhyGirl,
    Card
  },
  data() {
    return {
      activeSection: 'multi-dimensional'
    }
  }
}
</script>
