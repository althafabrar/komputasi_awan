pipeline {
    agent any

    tools {
        jdk 'JDK17' // Pastikan JDK-17 sudah terkonfigurasi di Global Tool Configuration
    }

    stages {
        stage('Checkout SCM') {
            steps {
                // Checkout kode dari GitHub repository
                checkout([$class: 'GitSCM', 
                          branches: [[name: 'main']], 
                          userRemoteConfigs: [[url: 'https://github.com/althafabrar/komputasi_awan']]])
            }
        }

        stage('Tool Install') {
            steps {
                echo 'Installing tools...'
                // Contoh jika ada tool tambahan yang perlu diinstall
                sh 'echo "No tools to install for now."'
            }
        }

        stage('Install Dependencies') {
            steps {
                echo 'Installing dependencies...'
                // Perintah instalasi dependency, sesuaikan dengan kebutuhan (misal npm, pip, dll.)
                sh '''
                echo "No dependencies to install for now."
                '''
            }
        }

        stage('Docker Build') {
            steps {
                echo 'Building Docker image...'
                // Contoh perintah build Docker image
                sh '''
                docker build -t komputasi_awan_image .
                '''
            }
        }
    }

    post {
        always {
            cleanWs() // Membersihkan workspace setelah pipeline selesai
            echo 'Pipeline completed.'
        }
        failure {
            echo 'Pipeline failed.'
        }
    }
}
