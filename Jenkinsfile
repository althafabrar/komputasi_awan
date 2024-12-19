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

        stage('Build Docker Image (Optional)') {
            // Add this stage if you want to build the image within the pipeline
            when {
                expression { // Define a condition to trigger this stage, e.g., branch name change
                    // ...
                }
            }
            steps {
                echo "Building Docker image..."
                sh '''
                docker build -t ${DOCKER_IMAGE} .
                '''
            }
        }

        stage('Run Docker Container') {
            steps {
                echo "Running Docker container..."
                script {
                    sh '''
                    # Stop and remove container (if exists)
                    docker stop ${DOCKER_CONTAINER} || true
                    docker rm ${DOCKER_CONTAINER} || true

                    # Check if image exists (consider adding error handling)
                    docker images | grep ${DOCKER_IMAGE} || {
                        echo "Error: Docker image '${DOCKER_IMAGE}' not found. Build the image first or check the image name."
                        exit 1
                    }

                    # Run container with available port (assuming you don't have a fixed port)
                    docker run -d --name ${DOCKER_CONTAINER} -p 2022:80 ${DOCKER_IMAGE} || {
                        echo "Docker run failed! Showing logs:"
                        docker logs ${DOCKER_CONTAINER} || true
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
