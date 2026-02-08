#!/bin/bash
##################################################
# script que mostra o menu de ajuda              #
##################################################

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

ARQUIVO="/var/www/shell/seguranca/testes_domingo.txt"

MENSAGEM_USO="
Uso: $0 [-h | -V]
  -h       Mostra esta tela de ajuda e sai
  -V       Mostra a nova versão do script e sai
"

# Tratamento das opções da linha de comando
# if [ "$1" = "-h" ]; then
#   echo -e "${GREEN}$MENSAGEM_USO${NC}"
#   exit 0
# elif [ "$1" = "-V" ]; then
#   echo -e "${GREEN}$NOVA_VERSAO${NC}"
# fi

# tratamento com o case
case "$1" in
  -h)
    echo -e "${GREEN}$MENSAGEM_USO${NC}"
    exit 0
    ;;
  -V)
    echo -e "${GREEN}$0 Versao 3${NC}"
    exit 0
    ;;
  *)
      if [ -n "$1" ]; then 
        echo -e "${RED}opcao invalida: $1 ${NC}"
        exit 1
      fi
    ;;
esac

echo ""
echo -e "${BLUE}*******************************************${NC}"

# Cabeçalho alinhado (opcional, mas fica bonito)
echo -e "${YELLOW}Usuário\t\tDescrição${NC}"
echo -e "${BLUE}-------------------------------------------${NC}"

# Extrai campo 1 e 5, separa por TAB
awk -F: '{printf "%-10s\t%s\n", $1, $5}' "$ARQUIVO"

echo ""
DATA=$(date)
echo -e "${YELLOW}$DATA${NC}"
echo -e "${GREEN}========== [ fim ] ==========${NC}"