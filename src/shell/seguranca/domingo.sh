#!/bin/bash
##################################################
# script que usa cores no terminal               #
##################################################

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color / Reset

PASTA="/var/www/shell/seguranca/testes_domingo.txt"

echo "$PASTA" | tr a-z A-Z
echo "================================="
echo -e "${RED}$PASTA${NC}"

# Mostra o CONTEÚDO do arquivo todo em maiúsculas
echo -e "${YELLOW}CONTEÚDO EM MAIÚSCULAS:${NC}"
cat "$PASTA" | tr 'a-z' 'A-Z'

echo ""
echo -e "${BLUE}*******************************************${NC}"

cut -d : -f 1,5 /var/www/shell/seguranca/testes_domingo.txt | tr : \\t


DATA=$(date)
echo -e "${YELLOW}$DATA${NC}"
echo -e "${GREEN}========== [ fim ] ==========${NC}"
