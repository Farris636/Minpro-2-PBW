<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portofolio - Farris</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="app">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">MyPortofolio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About Me</a></li>
                    <li class="nav-item"><a class="nav-link" href="#certificates">Certificates</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section id="home" class="vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <h1 class="fs-3 fw-normal">{{ profile.name }}</h1>
                    <h2 class="display-4 fw-bold">{{ profile.title }}</h2>
                    <p class="lead">{{ profile.description }}</p>
                    <a href="#about" class="btn btn-dark mt-8">Explore My Projects</a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="img/Foto.jpg" class="img-fluid profile-img" alt="Profile">
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT ME -->
    <section id="about" class="py-5 bg-dark text-light">
        <div class="container">
            <div class="row align-items-center mb-5">

                <div class="col-md-5 text-center mb-4 mb-md-0">
                    <img src="img/foto-2.jpg" class="img-fluid about-img shadow-lg">
                </div>

                <div class="col-md-7">
                    <h2 class="mb-4">About Me</h2>
                    <p class="fs-5">
                        Hello, I'm <strong>{{ profile.name }}</strong>, a 
                        <strong>{{ profile.title }}</strong> with 
                        <strong>1+ years of experience</strong>. 
                        I've successfully completed 
                        <strong>4 projects</strong>, showcasing my expertise 
                        in crafting seamless digital experiences.
                    </p>

                    <p>
                        With work experiences at <strong>Skilvul</strong> 
                        and <strong>Suitmedia Digital Agency</strong> as Intern, 
                        and currently at <strong>CrescentRating & HalalTrip</strong>, 
                        my design approach is enriched with adaptability and 
                        a deep understanding of user needs.
                    </p>

                    <p>
                        Let's collaborate and bring your ideas to life through 
                        innovative and user-centric design solutions.
                    </p>
                </div>
            </div>

            <!-- SKILLS & EXPERIENCE -->
            <div class="row mt-4">

                <!-- SKILLS -->
                <div class="col-md-6 mb-4">
                    <h4 class="mb-3">Skills</h4>

                    <div v-for="skill in skills" class="mb-3">
                        <div class="d-flex justify-content-between">
                            <span>{{ skill.name }}</span>
                            <span>{{ skill.level }}%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning"
                                 :style="{ width: skill.level + '%' }">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- EXPERIENCE -->
                <div class="col-md-6">
                    <h4 class="mb-3">Experience</h4>

                    <div class="card bg-secondary text-light mb-3"
                         v-for="exp in experiences">
                        <div class="card-body">
                            <h6 class="mb-1">{{ exp.year }}</h6>
                            <p class="mb-0">{{ exp.role }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="certificates" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Certificates</h2>
            <div class="row">
                <div class="col-md-4 mb-4" v-for="cert in certificates">
                    <div class="card h-100 shadow-lg border-0">
                        <img :src="cert.image" class="card-img-top certificate-img">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ cert.title }}</h5>
                            <p class="card-text">{{ cert.description }}</p>
                            <button class="btn btn-outline-dark btn-sm">View</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<script>
const { createApp } = Vue;

createApp({
    data() {
        return {
            profile: {},
            skills: [],
            experiences: [],
            certificates: []
        }
    },
    mounted() {
        fetch('api/getData.php')
            .then(res => res.json())
            .then(data => {
                this.profile = data.profile;
                this.skills = data.skills;
                this.experiences = data.experiences;
                this.certificates = data.certificates;
            });
    }
}).mount('#app');
</script>

</body>
</html>