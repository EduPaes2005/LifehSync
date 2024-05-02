<?php if (!$firstAccessCompleted): ?>
        <div class="first-access-form">
            <h3>Informe seu intuito de uso:</h3>
            <form id="first-access-form" method="POST" action="../action/FirstAccess.php">

                <div class="modality-field">
                    <label for="modality">Modalidade</label>
                    <select name="modality" required>
                        <option value="" disabled selected>Selecione...</option>
                        <option value="Trabalho">Trabalho</option>
                        <option value="Leitura">Leitura</option>
                        <option value="Estudo">Estudo</option>
                        <option value="Outros...">Outros...</option>
                    </select>
                </div>

                <button type="submit" name="submit">Enviar</button>
            </form>
        </div>
<?php endif; ?>