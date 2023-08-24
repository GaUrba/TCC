using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Threading;
using MySql.Data.MySqlClient;
using System.Reflection.Emit;

namespace TCC
{
    public partial class Form6 : Form
    {
        Thread nt;
        MySqlConnection con;
        public Form6()
        {
            try
            {
                con = new MySqlConnection("server=143.106.241.3;port=3306;User ID= cl200250;database= cl200250;password=cl*31012005");
            }
            catch
            {
                MessageBox.Show("Houve um erro ao realizar a conexão");
            }

        
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Close();
            nt = new Thread(novoForm2);
            nt.SetApartmentState(ApartmentState.STA);
            nt.Start();
        }
        private void novoForm2()
        {
            Application.Run(new Form2());
        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            try
            {
                con.Open();
                MySqlCommand queryBuscaCliente = new MySqlCommand("SELECT id,nome, email,senha,cpf FROM usuario WHERE id ='" + comboBox1.SelectedItem.ToString() + "'", con);
                MySqlDataReader resultado = queryBuscaCliente.ExecuteReader();

                if (resultado.Read())
                {
                    label5.Text = resultado["nome"].ToString();
                    label4.Text = resultado["email"].ToString();
                    label6.Text = resultado["senha"].ToString();
                    label3.Text = resultado["cpf"].ToString();
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
            finally
            {
                con.Close();
            }
        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }

        private void Form6_Load(object sender, EventArgs e)
        {
            try
            {
                con.Open();
                MySqlCommand queryBuscaCliente = new MySqlCommand("SELECT id FROM usuario", con);
                MySqlDataReader resultado = queryBuscaCliente.ExecuteReader();
                while (resultado.Read())
                {
                    comboBox1.Items.Add(resultado["id"].ToString());
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
            finally
            {
                con.Close();
            }
            try
            {
                con.Open();
                MySqlCommand queryBuscaCompra = new MySqlCommand("SELECT id FROM compra", con);
                MySqlDataReader resultado = queryBuscaCompra.ExecuteReader();
                while (resultado.Read())
                {
                    comboBox2.Items.Add(resultado["id"].ToString());
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
            finally
            {
                con.Close();
            }

        }

        private void button2_Click(object sender, EventArgs e)
        {
            con.Open();
            MySqlCommand queryDeletaUsuario = new MySqlCommand("DELETE FROM usuario WHERE id = '" + comboBox1.Text + "'", con);
            queryDeletaUsuario.ExecuteNonQuery();

            MessageBox.Show("usuario excluído com sucesso");
            con.Close();
        }

        private void comboBox2_SelectedIndexChanged(object sender, EventArgs e)
        {
            try
            {
                con.Open();
                MySqlCommand queryBuscaProduto = new MySqlCommand("SELECT id, id_produto, id_usuario, data_compra FROM compra WHERE id ='" + comboBox2.SelectedItem.ToString() + "'", con);
                MySqlDataReader resultado = queryBuscaProduto.ExecuteReader();

                if (resultado.Read())
                {
                    label9.Text = resultado["id_usuario"].ToString();
                    label12.Text = resultado["id_produto"].ToString();
                    label14.Text = resultado["data_compra"].ToString();

                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
            finally
            {
                con.Close();
            }
        }
    }
}
