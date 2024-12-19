pipeline {
    agent any

    environment {
        DOCKER_IMAGE = 'komputasi_awan_image'
        DOCKER_TAG = 'latest'
        REPO_URL = 'https://github.com/althafabrar/komputasi_awan.git'
    }

    stages {
        stage('Checkout') {
            steps {
                git url: "${REPO_URL}"
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    // Build Docker image
                    docker.build("${DOCKER_IMAGE}:${DOCKER_TAG}")
                }
            }
        }

        stage('Run Docker Container') {
            steps {
                script {
                    // Run Docker container from the image
                    docker.run("${DOCKER_IMAGE}:${DOCKER_TAG}")
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                script {
                    // Optionally, push to Docker registry (e.g., Docker Hub or private registry)
                    // docker.withRegistry('https://index.docker.io/v1/', 'docker-credentials') {
                    //     docker.image("${DOCKER_IMAGE}:${DOCKER_TAG}").push()
                    // }
                }
            }
        }

        stage('Clean Up') {
            steps {
                script {
                    // Clean up Docker images after the build
                    sh 'docker system prune -f'
                }
            }
        }
    }
}
