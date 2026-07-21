# Production-Grade Kubernetes Platform on AWS

## Project Overview

This project demonstrates how to build a production-ready Kubernetes platform on AWS using Infrastructure as Code (Terraform), Amazon EKS, Helm, and Kubernetes best practices.

The platform provisions AWS infrastructure, deploys a containerized microservices application, configures secure ingress with SSL, enables automatic scaling, and implements monitoring and centralized logging.

---

## Objectives

- Deploy AWS infrastructure using Terraform
- Create a production-ready Amazon EKS cluster
- Deploy a Laravel frontend and backend services
- Deploy PostgreSQL database
- Configure NGINX Ingress Controller
- Enable HTTPS using SSL certificates
- Configure Horizontal Pod Autoscaler (HPA)
- Monitor workloads using Prometheus and Grafana
- Centralize logs using Fluent Bit, Elasticsearch, and Kibana

---

# Architecture

```
Terraform
      │
      ▼
AWS VPC
      │
      ▼
Amazon EKS
      │
      ▼
NGINX Ingress
      │
      ▼
Laravel Frontend
      │
      ▼
Laravel Backend API
      │
      ▼
PostgreSQL
      │
      ├───────────────┐
      ▼               ▼
Prometheus         Fluent Bit
      │               │
      ▼               ▼
Grafana        Elasticsearch
                     │
                     ▼
                  Kibana
```

---

# Technologies Used

| Technology | Purpose |
|------------|---------|
| AWS | Cloud Platform |
| Amazon EKS | Kubernetes Cluster |
| Terraform | Infrastructure as Code |
| Docker | Containerization |
| Kubernetes | Container Orchestration |
| Helm | Kubernetes Package Manager |
| NGINX Ingress | External Traffic Routing |
| cert-manager | SSL Certificates |
| Prometheus | Metrics Collection |
| Grafana | Monitoring Dashboard |
| Fluent Bit | Log Collection |
| Elasticsearch | Log Storage |
| Kibana | Log Visualization |
| PostgreSQL | Database |
| Laravel | Web Application |

---

# Project Structure

```
project-root/

├── terraform/
│   ├── vpc.tf
│   ├── eks.tf
│   ├── variables.tf
│   ├── outputs.tf
│   └── providers.tf
│
├── kubernetes/
│   ├── frontend/
│   ├── backend/
│   ├── database/
│   ├── ingress/
│   ├── monitoring/
│   ├── logging/
│   └── autoscaling/
│
├── docker/
│
├── screenshots/
│
└── README.md
```

---

# Infrastructure

## AWS Resources

- Amazon VPC
- Public Subnets
- Private Subnets
- NAT Gateway
- Internet Gateway
- Route Tables
- Security Groups
- IAM Roles
- Amazon EKS Cluster
- Managed Node Group

---

# Application Components

## Frontend

- Laravel Application
- Docker Container
- Kubernetes Deployment
- Kubernetes Service

## Backend API

- Laravel REST API
- Kubernetes Deployment
- Kubernetes Service

## Database

- PostgreSQL
- Persistent Volume
- Persistent Volume Claim
- StatefulSet

---

# Deployment

## Clone Repository

```bash
git clone https://github.com/yourusername/project.git
cd project
```

---

## Initialize Terraform

```bash
cd terraform

terraform init
```

---

## Review Infrastructure

```bash
terraform plan
```

---

## Deploy Infrastructure

```bash
terraform apply
```

---

## Configure kubectl

```bash
aws eks update-kubeconfig \
--region us-east-1 \
--name production-cluster
```

---

## Verify Cluster

```bash
kubectl get nodes
```

---

## Deploy Applications

```bash
kubectl apply -f kubernetes/
```

---

## Install NGINX Ingress

```bash
helm repo add ingress-nginx https://kubernetes.github.io/ingress-nginx

helm install ingress-nginx ingress-nginx/ingress-nginx
```

---

## Install Monitoring

```bash
helm repo add prometheus-community https://prometheus-community.github.io/helm-charts

helm install monitoring prometheus-community/kube-prometheus-stack
```

---

## Install Logging

Deploy

- Fluent Bit
- Elasticsearch
- Kibana

using Helm charts.

---

# Monitoring

The project includes:

- Cluster Metrics
- Node Metrics
- Pod Metrics
- CPU Usage
- Memory Usage
- Network Usage
- Storage Metrics

Dashboard:

- Grafana

---

# Logging

Centralized logging pipeline:

```
Pods

↓

Fluent Bit

↓

Elasticsearch

↓

Kibana
```

---

# Autoscaling

Horizontal Pod Autoscaler

- Minimum Replicas: 2
- Maximum Replicas: 5
- CPU Threshold: 70%

---

# Security

- IAM Roles
- Kubernetes RBAC
- Security Groups
- HTTPS
- TLS Certificates
- Kubernetes Secrets
- Private Worker Nodes

---

# Screenshots

Add screenshots of:

- Terraform Apply
- EKS Cluster
- kubectl get nodes
- Pods Running
- Services
- Ingress
- Grafana Dashboard
- Kibana Dashboard
- HPA
- AWS Console

---

# Future Improvements

- GitHub Actions CI/CD
- ArgoCD
- AWS Load Balancer Controller
- External Secrets
- HashiCorp Vault
- Service Mesh (Istio)
- Cluster Autoscaler

---

# Author

Amsettu Ibrahim

Graduate Professional Diploma in DevOps & Cloud Engineering

AWS | Kubernetes | Terraform | Docker | Laravel

---

# License

MIT License