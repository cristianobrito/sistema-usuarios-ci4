#!/bin/bash
# ================================================
# COMANDOS CURL - API de Usuários (CodeIgniter 4)
# Rode com:   bash api-usuarios-curl.sh
# ================================================

BASE_URL="http://localhost:8080/api/users"

echo "=== API USUÁRIOS - TESTES COM CURL ==="

# 1. GET - Listar todos os usuários
echo -e "\n1. GET /api/users (listar todos)"
curl -X GET "$BASE_URL"

# 2. GET - Buscar um usuário específico (troque o 1 pelo ID real)
echo -e "\n\n2. GET /api/users/3 (buscar um usuário)"
curl -X GET "$BASE_URL/3"

# 3. POST - Criar novo usuário
echo -e "\n\n3. POST /api/users (criar)"
curl -X POST "$BASE_URL" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Ana Costa",
    "email": "ana.costa@email.com",
    "password": "12345678"
  }'

# 4. PUT - Atualizar um usuário (troque o 1 pelo ID)
echo -e "\n\n4. PUT /api/users/20 (atualizar)"
curl -X PUT "$BASE_URL/20" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Ana Silva Costa",
    "email": "ana.silva@email.com"
  }'

# 5. DELETE - Deletar um usuário (troque o 1 pelo ID)
echo -e "\n\n5. DELETE /api/users/22 (deletar)"
curl -X DELETE "$BASE_URL/22"

echo -e "\n\n=== FIM DOS TESTES ==="