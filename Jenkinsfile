pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "isa_rental_mobil_website-master"
        DOCKER_CONTAINER = "isa_rental_mobil_website-master"
    }

    stages {
        stage('Clone Repository') {
            steps {
                echo "Cloning repository..."
                git branch: 'main', url: 'https://github.com/althafabrar/komputasi_awan.git'
            }
        }

        stage('Run Docker Container') {
            steps {
                echo "Running Docker container..."
                script {
                    sh '''
                    # Stop dan hapus container lama jika ada
                    docker stop isa_rental_mobil_website-master || true
                    docker rm isa_rental_mobil_website-master || true

                    # Jalankan container dari image yang sudah ada
                    docker run -d --name isa_rental_mobil_website-master -p 2022:80 isa_rental_mobil_website-master || {
                        echo "Docker run failed! Showing logs:"
                        docker logs isa_rental_mobil_website-master || true
                        exit 1
                    }
                    '''
                }
            }
        }
    }

    post {
        success {
            echo "Pipeline executed successfully!"
        }
        failure {
            echo "Pipeline failed. Please check the logs."
        }
    }
}
