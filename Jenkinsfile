pipeline {
    agent any
    stages {
        stage('Checkout SCM') {
            steps {
                checkout([$class: 'GitSCM', 
                          branches: [[name: 'main']], 
                          userRemoteConfigs: [[url: 'https://github.com/althafabrar/komputasi_awan']]])
            }
        }
        stage('Tool Install') {
            steps {
                echo 'Installing tools...'
            }
        }
        stage('Install Dependencies') {
            steps {
                echo 'Installing dependencies...'
            }
        }
        stage('Docker Build') {
            steps {
                echo 'Building Docker image...'
            }
        }
    }
    post {
        always {
            cleanWs()
            echo 'Pipeline completed.'
        }
        failure {
            echo 'Pipeline failed.'
        }
    }
}
