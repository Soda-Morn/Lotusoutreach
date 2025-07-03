<template>
  <div>
    <WhyGirl />
    <div class="container mx-auto py-8">
      <h2 class="text-2xl font-bold text-center mb-6">Our Focus Areas</h2>
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <Card title="Education and Training"
          content="Girls’ education is a transformative force. Educated women experience wide-ranging benefits. They have healthier children, are at less risk of experiencing domestic violence and marrying young, have fewer children, higher incomes, and more respect in making household decisions. These advantages combined can help tp lift households, communities, and nations out of poverty. Moreover, and at the cornerstone of our approach to social development, educated women are more likely to become active and influential members of their communities.

            The education of women is an international development priority. UNESCO estimates “130 million girls between the age of 6 and 17 are out of school and 15 million girls of primary-school age—half of them in sub-Saharan Africa— will never enter a classroom.”
            In the poverty-stricken areas of India and Cambodia where we work, women face significant barriers to education. Often they are up against having to travel long distances to school, restrictive gender narratives, violence, and trafficking and/or migration.
            We combine advocacy efforts with the provision of access to education, university level scholarships, and assistance to ensure young Indian and Cambodian women finish locally unprecedented levels of education and/or skill training. We provide seminars and mentoring that emphasize skills and development that prepare young women to be catalysts of profound shifts in their communities."
          buttonText="Learn more" cardClass="bg-blue-600 text-white" buttonClass="bg-blue-600 text-white" />
        <Card title="Creating Gender Equality"
          content="	
            Where there is poverty, there are opportunities for exploitation. Women and girls are much more vulnerable than men and boys  in low income countries where gender discrimination impacts all levels of social, economic and political life. We recognize gender discrimination and work toward gender equality in the communities we are active. Notably, in 2014, our LEARN (now Blossom Bus) program received national recognition in India by the Chief Minister of the state for “contributing to the education of 1 million students in Haryana.”. In 2016, Harvard University South Asia Institute and Tata Trust recognized our program out of thousands of others in India for reducing gender discrimination.
            Gender theory recognizes a discrimination concept known as “womens’ triple burden”. Women work the fields, look after home and care for children, and shoulder the burden of maintaining family and social networks – relationships that are extremely important to societies living on the poverty line. Cultural norms among those living in poverty create barriers to education for girls, impose early marriages, and reinforce little to no wages for work done.
            The 2016, Down to Earth yearbook published extracts of a report from an Indian National Commission for Women that showed women in India work twice as many hours as farm animals and three times more than men. What is more, women in India only have legal right to 12.78% of the agricultural land they spend 60 hours a week farming for no pay. (Centre for Science and Environment, New Delhi, 2016 Down To Earth year book p. 67-68)
            The women we invest in invest in their families and communities. Our advocacy and mobilization programs amplify their much-needed voices within their communities and catalyze change at a grassroots level.
            As women and girls gain confidence, self-esteem, and initiative, they inspire the change in their sisters, friends and families. This creates a trickle-down effect; cultural norms shift and communities are transformed."
          buttonText="Learn more" cardClass="bg-blue-600 text-white" buttonClass="bg-blue-600 text-white" />
        <Card title="Care and Protection"
          content="	
            Our care initiatives address gaps in the provision of basic needs in places where the conditions for exploitation are devastating. These initiatives work together with our education and training projects to cultivate empowerment and protection for those who need it most. Providing care and protection nourishes wellbeing among beneficiaries and supports educational and learning outcomes.
            According to the United Nations, while human trafficking victims can be people of both genders, over 70% of those victims are women and girls. Moreover, 54% of all trafficking victims in 2014 were said to be trafficked for the purpose of sexual exploitation. Armed with this knowledge, we cannot stand idly by. We must do something.
            Because trafficking is inextricably linked to poverty around the world, all of our programs are preventative in nature. In the areas of Cambodia where we work, young women without education migrate by the tens of thousands from the rural countryside to cities looking for work to help support their families. Without options, the conditions for exploitation are tenfold. In India, reducing the devastating impacts of malnutrition is a worldwide priority.
            Providing care in vulnerable communities transforms lives and our impact is multiplied through the capacity and vision of the young women and girls we support."
          buttonText="Learn more" cardClass="bg-blue-600 text-white" buttonClass="bg-blue-600 text-white" />
        <Card title="Anti-trafficking, Health and Water Services"
          content="Lotus Outreach anti-trafficking, health and water service programs are directly serving 17,000 women and children in 2019.
            Education, literacy and advocacy play an important role in protecting girls from exploitation. As the voices of women strengthen, they are spurred to demand equality and look out for one another. In this way, education and training addresses exploitation before it can occur. For those who are survivors of violence, we have projects that provide trauma therapy, social services, and economic empowerment.
            Our work in anti-trafficking, health and water very directly improve wellbeing and educational outcomes. Our well program provides clean water and health education to communities in dire need while supporting school attendance for children who might otherwise be walking long distances for potable water while their parents earn wages. Instead, health and education are supported by the nearby wells we provide. Our rural health program is directly empowering local health workers to educate their communities.
            We are proud to support the conditions for our beneficiaries to thrive."
          buttonText="Learn more" cardClass="bg-blue-600 text-white" buttonClass="bg-blue-600 text-white" />
      </div>
      <div class="mt-12 text-center">
        <h2 class="text-2xl font-bold mb-4">How do we empower women and children in crisis?</h2>
        <div class="flex justify-center space-x-4 mb-4">
          <button @click="activeSection = 'multi-dimensional'"
            :class="{ 'bg-blue-600 text-white': activeSection === 'multi-dimensional', 'bg-gray-200 text-gray-700 hover:bg-gray-300': activeSection !== 'multi-dimensional' }"
            class="px-4 py-2 rounded-lg shadow-md">Multi-dimensional</button>
          <button @click="activeSection = 'local'"
            :class="{ 'bg-blue-600 text-white': activeSection === 'local', 'bg-gray-200 text-gray-700 hover:bg-gray-300': activeSection !== 'local' }"
            class="px-4 py-2 rounded-lg shadow-md">Local</button>
          <button @click="activeSection = 'engaged'"
            :class="{ 'bg-blue-600 text-white': activeSection === 'engaged', 'bg-gray-200 text-gray-700 hover:bg-gray-300': activeSection !== 'engaged' }"
            class="px-4 py-2 rounded-lg shadow-md">Engaged</button>
          <button @click="activeSection = 'innovative'"
            :class="{ 'bg-blue-600 text-white': activeSection === 'innovative', 'bg-gray-200 text-gray-700 hover:bg-gray-300': activeSection !== 'innovative' }"
            class="px-4 py-2 rounded-lg shadow-md">Innovative</button>
        </div>
        <div v-if="activeSection === 'multi-dimensional'" class="bg-gray-50 p-4 rounded-lg shadow-md mt-4">
          <p class="text-gray-700">Successful programs embrace the complex nature of the development process, and
            introduce holistic solutions where possible. Our scholarship programs do this, incorporating nutrition
            support, personal and professional development, trafficking awareness, and gender-based advocacy. Families
            living in poverty often rely on their girl children to help make ends meet so providing families with
            nutritional support helps ensure families remain committed to their girls’ education. Our programs integrate
            cross-cutting methods in areas we define as education, training, and care to support the development of
            communities experiencing multiple dimensions of poverty and vulnerability.</p>
        </div>
        <div v-if="activeSection === 'local'" class="bg-gray-50 p-4 rounded-lg shadow-md mt-4">
          <p class="text-gray-700">We are unique in that we have two local NGOs on the ground: one in India and the
            other in Cambodia. Through 25 years of experience, we have prioritized cultural nuance as a core element of
            program design. Values, priorities, and capabilities not only change from one country to another, but also
            from one village to another. Our locally-based programs allow us to implement solutions that are highly
            responsive to local conditions and the changing needs and priorities of our beneficiaries. Our programs
            align with national level social development objectives in order to best partner with local governance and
            communities. Program staff are native to the areas they work, which makes the work being done very personal
            for them. We are able to operate highly cost-effective and adaptable programs in collaboration with
            community support. This kind of local collaboration is essential to our approach to sustainable development.
          </p>
        </div>
        <div v-if="activeSection === 'engaged'" class="bg-gray-50 p-4 rounded-lg shadow-md mt-4">
          <p class="text-gray-700">When we say "change spreads fastest from the ground up" we mean that we believe
            sustainable change occurs most effectively at the grassroots. The communities we work in are our partners in
            advocacy and action. We rely on the mobilization of community networks through relationships built on trust
            and understanding. Our scholarship and access to education programs necessitate the support of teachers and
            community leaders, while we mobilize parents and school management committees to attend to the education of
            their children. At our well sites, we establish community water committees to maintain the new resources and
            model hygienic behaviors. In the rural health sector, we train government health workers in their
            responsibilities and empower them to be advocates of community health. Our lasting networks have supported
            our core programs for more than 10 years and exemplify the benefit of working together. Community members
            and beneficiaries are our long-term partners in creating change that sticks.</p>
        </div>
        <div v-if="activeSection === 'innovative'" class="bg-gray-50 p-4 rounded-lg shadow-md mt-4">
          <p class="text-gray-700">Ground up and participatory based community change is at the cutting edge of
            sustainable development approaches. We engage directly with local and multidimensional conditions to spur
            sustainable shifts. We start by working within existing infrastructures to deliver access to education and
            health services, filling in gaps in the matrix of conditions to enable success and wellbeing for
            beneficiaries living in poverty. A scholarship is of no benefit if girls cannot reach school, while if
            families are hungry they may send girls to work instead of school. We provide transport where it can help
            and rice support where it will maintain families’ commitments to their girls’ education. Our solutions align
            with local governance objectives and adapt in conversation with communities. We started LEARN by assessing
            school amenities. Then we initiated community mobilization around girls’ education, developed school
            management committees and created quality education training for teachers, which eventually gave rise to the
            Blossom Bus. All of our programs are replicable and scalable across the countries they operate in.</p>
        </div>
      </div>
      <div class="mt-8 text-center">
        <Card title="Clean Water for Communities"
          content="Clean water is care for girls and their families. 60% of rural communities don’t have access to clean drinking water. Over 10 years we have provided clean water for 10,000 villagers."
          image="https://via.placeholder.com/600x300?text=Clean+Water" />
        <p class="mt-4 text-blue-600">Access to education for girls is the most powerful way to spark community
          engagement and economic growth.</p>
        <!-- New Clean Water for Communities Section -->
        <!-- <Card
          title="Clean Water for Communities"
          content="Clean water is care for girls and their families. 60% of rural communities don’t have access to clean drinking water. Over 10 years we have provided clean water for 10,000 villagers."
          image="https://via.placeholder.com/600x300?text=Clean+Water+for+Communities"
        />
        <p class="mt-4 text-blue-600">Access to education for girls is the most powerful way to spark community engagement and economic growth.</p> -->
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