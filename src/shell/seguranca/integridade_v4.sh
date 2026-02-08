#!/bin/bash

PASTA="/var/www/shell"
BASE="/var/www/shell/seguranca"

ATUAL="$BASE/hashes_atual.txt"
ANTERIOR="$BASE/hashes_anterior.txt"
LOG="$BASE/seg_v4.log"

timestamp() {
    date "+%Y-%m-%d %H:%M:%S"
}

log_evento() {
    NIVEL="$1"
    TIPO="$2"
    ARQUIVO="$3"
    # echo "$(timestamp) | $NIVEL | $TIPO | $ARQUIVO" | tee -a "$LOG"

    printf "%-19s | %-6s | %-13s | %s\n" \
        "$(timestamp)" \
        "$NIVEL" \
        "$TIPO" \
        "$ARQUIVO" | tee -a "$LOG"
}

gerar_hashes() {
    find "$PASTA" -type f \
        ! -name "seg_v4.log" \
        ! -name "cron.log" \
        ! -name "hashes_atual.txt" \
        ! -name "hashes_anterior.txt" \
        -exec sha256sum {} \; > "$ATUAL"
}

primeira_execucao() {
    if [ ! -f "$ANTERIOR" ]; then
        log_evento "INFO" "BASELINE" "Criando baseline inicial"
        cp "$ATUAL" "$ANTERIOR"
        exit 0
    fi
}

classificar_eventos() {
    diff "$ANTERIOR" "$ATUAL" | while read linha
    do
        case "$linha" in
            \<*)
                ARQUIVO=$(echo "${linha#< }" | awk '{print $2}')
                log_evento "ALERT" "REMOVIDO" "$ARQUIVO"
                ;;
            \>*)
                ARQUIVO=$(echo "${linha#> }" | awk '{print $2}')
                log_evento "INFO" "NOVO/ALTERADO" "$ARQUIVO"
                ;;
        esac
    done
}

atualizar_baseline() {
    cp "$ATUAL" "$ANTERIOR"
}

# ===== EXECUCAO =====
echo "=============================="
echo "MONITOR DE INTEGRIDADE"
echo "=============================="

gerar_hashes
primeira_execucao
classificar_eventos
atualizar_baseline

echo "===== FIM ====="
